<?php

namespace App\Http\Controllers;

use App\Models\FormStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\FormSubmission;
use App\Models\School;
use App\Models\StudentCourse;
use App\Models\StudentGroup;
use App\Models\StudentLanguage;
use App\Models\StudentPackage;
use App\Models\StudentSubject;
use App\Models\StudentYear;
use Stripe\Stripe;
use Stripe\PaymentIntent;


class MultiStepFormController extends Controller
{
    public function studentAdmission()
    {
        return view('student.index');
    }

    public function getYears($group_id)
    {
        $years = StudentYear::where('group_id', $group_id)->get(['id', 'name']);
        return response()->json($years);
    }

    public function getPackages($group_id, $year_id)
    {
        $packages = StudentPackage::all(); // StudentPackage just has names
        return response()->json($packages);
    }

    public function getCourseDetails(Request $request)
    {
        $group_id = $request->group_id;
        $year_id = $request->year_id;
        $package_id = $request->package_id;

        $course = StudentCourse::where('group_id', $group_id)
            ->where('year_id', $year_id)
            ->where('package_id', $package_id)
            ->first();

        if (!$course) return response()->json(['error' => 'No course found'], 404);

        // Helper to decode JSON or comma string into array
        $toArray = function ($value) {
            if (!$value) return [];
            if (is_array($value)) return $value;
            if ($json = json_decode($value, true)) return is_array($json) ? $json : [];
            return explode(',', $value); // fallback for comma-separated string
        };

        $coreSubjects = $toArray($course->core_subject);
        $coreNames = StudentSubject::whereIn('id', $coreSubjects)->pluck('name');

        $islamicSubjects = $toArray($course->islamic_subject);
        $islamicNames = StudentSubject::whereIn('id', $islamicSubjects)->pluck('name');

        $additionalSubjects = $toArray($course->additional_subject);
        $additionalNames = StudentSubject::whereIn('id', $additionalSubjects)->pluck('name');

        $languages = $toArray($course->language);
        $languageNames = StudentLanguage::whereIn('id', $languages)->pluck('name');

        return response()->json([
            'core_subject' => $coreNames,
            'islamic_subject' => $islamicNames,
            'additional_subject' => $additionalNames,
            'language' => $languageNames,
            'hifdh' => $course->hifdh ?? 0,
            'hifdh_text' => $course->hifdh_text ?? '',
        ]);
    }


    // ===================== Show step =====================
    public function showStep($step)
    {
        $submissionId = Session::get('submission_id');
        $data = [];

        if ($submissionId) {
            $submission = FormSubmission::with('students.course', 'students.course.year', 'students.course.package', 'students.group')->find($submissionId);
            if ($submission) $data = $submission->toArray();
            // $submission = FormSubmission::with('students.course')->find($submissionId);
            // $data = $submission ? $submission->toArray() : [];
            // submitted packages থাকলে আলাদা key করে পাঠালাম
            $data['submitted_packages'] = $submission->packages ?? [];
        }

        $schools = School::where('status', 1)->get();
        $groups = StudentGroup::where('status', 1)->get();



        return view("student.step{$step}", compact('data', 'schools', 'groups'));
    }

    // ===================== Handle step POST =====================
    public function postStep(Request $request, $step)
    {
        $submissionId = Session::get('submission_id');
        $sessionUserId = Session::get('user_id'); // session user id

        // ================= Step 1 =================
        if ($step == 1) {
            $validated = $request->validate([
                'selected_school' => 'nullable|string|max:255',
            ]);

            $submission = FormSubmission::updateOrCreate(
                ['id' => $submissionId],
                [
                    'user_id' => $sessionUserId,
                    'selected_school' => $validated['selected_school'] ?? null,
                    'status' => 'in_progress',
                ]
            );

            Session::put('submission_id', $submission->id);
        }

        // ================= Step 2 =================
        elseif ($step == 2) {
            $validated = $request->validate([
                'title' => 'required|string|max:20',
                'fname' => 'required|string|max:100',
                'lname' => 'required|string|max:100',
                'relationship' => 'required|string|max:50',
                'email' => 'required|email',
                'confirm_email' => 'required|email|same:email',
                'mobile_number' => 'required|string',
                'home_telephone' => 'nullable|string',
                'work_number' => 'required|string',
                'address' => 'required|string',
                'apartment' => 'nullable|string',
                'city' => 'required|string',
                'province' => 'required|string',
                'postal_code' => 'required|string',
                'country' => 'required|string',
                'file1' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
                'file2' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
                'secondary_title' => 'nullable|string|max:20',
                'secondary_fname' => 'nullable|string|max:100',
                'secondary_lname' => 'nullable|string|max:100',
                'secondary_relationship' => 'nullable|string|max:50',
                'secondary_email' => 'nullable|email',
                'secondary_confirm_email' => 'nullable|email|same:secondary_email',
                'secondary_mobile_number' => 'nullable|string',
                'secondary_home_telephone' => 'nullable|string',
                'secondary_work_number' => 'nullable|string',
                'secondary_address' => 'nullable|string',
                'secondary_apartment' => 'nullable|string',
                'secondary_city' => 'nullable|string',
                'secondary_province' => 'nullable|string',
                'secondary_postal_code' => 'nullable|string',
                'secondary_country' => 'nullable|string',
                'file3' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
                'file4' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            ]);

            // File uploads
            foreach (['file1', 'file2', 'file3', 'file4'] as $file) {
                if ($request->hasFile($file)) {
                    $validated[$file] = $request->file($file)->store('forms', 'public');
                }
            }

            FormSubmission::where('id', $submissionId)->update($validated);
        }

        // ================= Step 3: Students =================
        elseif ($step == 3) {
            $validated = $request->validate([
                'fname.*' => 'required|string|max:100',
                'lname.*' => 'required|string|max:100',
                'dob.*' => 'required|date',
                'gender.*' => 'required|string',
                'nationality.*' => 'required|string',
                'start_date.*' => 'required|string',
                'group_id.*' => 'required|integer',
                'year_id.*' => 'required|integer',
                'package_id.*' => 'required|integer',
                'core_subjects.*' => 'nullable|string',
                'islamic_subjects.*' => 'nullable|string',
                'additional_subjects.*' => 'nullable|string',
                'language_subjects.*' => 'nullable|string',
                'hifdh_subjects.*' => 'nullable|string',
                'hifdh_option.*' => 'nullable|string',
                'student_file1.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'student_file2.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            ]);

            // আগের student মুছে ফেলবো
            FormStudent::where('form_submission_id', $submissionId)->delete();

            $count = count($validated['fname']);
            for ($i = 0; $i < $count; $i++) {
                $file1Path = isset($request->file('student_file1')[$i])
                    ? $request->file('student_file1')[$i]->store('students', 'public')
                    : null;

                $file2Path = isset($request->file('student_file2')[$i])
                    ? $request->file('student_file2')[$i]->store('students', 'public')
                    : null;

                FormStudent::create([
                    'form_submission_id' => $submissionId,
                    'fname' => $validated['fname'][$i],
                    'lname' => $validated['lname'][$i],
                    'dob' => $validated['dob'][$i],
                    'gender' => $validated['gender'][$i],
                    'nationality' => $validated['nationality'][$i],
                    'start_date' => $validated['start_date'][$i],
                    'group_id' => $validated['group_id'][$i],
                    'year_id' => $validated['year_id'][$i],
                    'package_id' => $validated['package_id'][$i],
                    'core_subjects' => $validated['core_subjects'][$i] ?? null,
                    'islamic_subjects' => $validated['islamic_subjects'][$i] ?? null,
                    'additional_subjects' => $validated['additional_subjects'][$i] ?? null,
                    'language_subjects' => $validated['language_subjects'][$i] ?? null,
                    'hifdh_subjects' => $validated['hifdh_subjects'][$i] ?? null,
                    'hifdh' => !empty($request->hifdh_option[$i]) ? 1 : 0,
                    'student_file1' => $file1Path,
                    'student_file2' => $file2Path,
                ]);
            }
        }

        // ================= Step 4 =================
        elseif ($step == 4) {
            $validated = $request->validate([
                'health_care' => 'nullable|string',
                'previus_school' => 'nullable|string',
                'access_protocol' => 'nullable|string',
                'aythority' => 'nullable|string',
                'name' => 'nullable|string',
                'special_education' => 'nullable|string',
                'medical_condition' => 'nullable|string',
                'direct_placement' => 'nullable|string',
                'accpet' => 'nullable',
                'authority' => 'nullable',
                'assigned' => 'nullable',
                'percentage' => 'nullable',
            ]);



            FormSubmission::where('id', $submissionId)->update($validated);
        }

        // ================= Step 5 =================


        elseif ($step == 5) {
            $validated = $request->validate([
                'packages' => 'required|array',
                'packages.*.student_id' => 'required|integer',
                'packages.*.package' => 'required|string',
                'packages.*.regular_price' => 'required',
                'packages.*.discount_price' => 'nullable',
                'packages.*.discount' => 'nullable',
            ]);


            FormSubmission::where('id', $submissionId)->update([
                'packages' => json_encode($validated['packages'])
            ]);
        }


        // ================= Step 6 =================
        elseif ($step == 6) {
            $validated = $request->validate([
                'signature' => 'required|string',
                'signature_accept' => 'required',
            ]);

            FormSubmission::where('id', $submissionId)->update([
                'signature' => $validated['signature'],
                'signature_accept' => $validated['signature_accept'],
            ]);
        }

        // ================= Step 7: Payment =================
        elseif ($step == 7) {
            $validated = $request->validate([
                'payment_email' => 'required|email',
                'payment_country' => 'required|string',
                'payment_postal_code' => 'required|string',
                'payment_accept' => 'accepted',
                'card_holder_name' => 'required|string',
            ]);

            $submission = FormSubmission::findOrFail($submissionId);

            // Amount calculation (students * 15)
            $totalAmount = (count($submission->students) * 15) * 100; // cents for Stripe

            // ==================== STRIPE PAYMENT ====================
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET')); // test/live key

            try {
                $paymentIntent = \Stripe\PaymentIntent::create([
                    'amount' => $totalAmount,
                    'currency' => 'usd', // change currency if needed
                    'payment_method_types' => ['card'],
                    'receipt_email' => $validated['payment_email'],
                ]);

                $submission->update([
                    'payment_email' => $validated['payment_email'],
                    'payment_country' => $validated['payment_country'],
                    'payment_postal_code' => $validated['payment_postal_code'],
                    'payment_accept' => $validated['payment_accept'],
                    'card_holder_name' => $validated['card_holder_name'],
                    'status' => 'paid',
                    'paid_amount' => $totalAmount / 100,
                    'total_amount' => $totalAmount / 100,
                    'transaction_id' => $paymentIntent->id,
                    'currency' => 'usd',
                    'payment_date' => now(),
                ]);

                Session::forget('submission_id');

                return redirect()->route('form.step', 1)
                    ->with('success', 'Form submitted & payment successful!');
            } catch (\Exception $e) {
                return back()->withErrors(['payment_error' => $e->getMessage()]);
            }
        }

        return redirect()->route('form.step', $step + 1);
    }
}
