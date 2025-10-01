<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class WordPressApiController extends Controller
{
    public function jobApplication(Request $request)
    {
        $response = Http::get('https://alrushd.co.uk/wp-json/custom/v1/form-submissions/83be6e8');

        if (!$response->successful()) {
            return abort(500, 'API Fetch Failed');
        }

        $data = collect($response->json()['submissions']);
        // @dd($data);

        // ✅ Sort by created_at descending (newest first)
        $data = $data->sortByDesc(function ($item) {
            return strtotime($item['created_at']);
        })->values();

        // ✅ Pagination setup
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $data->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $paginatedData = new LengthAwarePaginator(
            $currentItems,
            $data->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('admin.api.job-application', ['data' => $paginatedData, 'allData' => $data]);
    }


    public function jobApplicationView($id)
    {
        $response = Http::get('https://alrushd.co.uk/wp-json/custom/v1/form-submissions/83be6e8');

        if (!$response->successful()) {
            return abort(500, 'API Fetch Failed');
        }


        $data = collect($response->json()['submissions']);

        // Find submission by actual ID
        $submission = $data->firstWhere('id', (int)$id);

        if (!$submission) {
            abort(404, 'Submission not found');
        }

        // Field label mapping
        $labels = [
            'name' => 'Candidate Details Job Applied For',
            'field_a579d1c' => 'Forename',
            'email' => 'Middle Names',
            'field_c90264c' => 'Surname',
            'message' => 'Preferred Name',
            'field_fa1fc8d' => 'Date of Birth',
            'field_36f8b56' => 'Gender',
            'field_facd0f4' => 'Marital Status',
            'field_6ccfce5' => 'Nationality',
            'field_926b28e' => 'Religion',
            'field_e85f923' => 'Mobile Number',
            'field_47d2c6a' => 'Home Telephone',
            'field_0bc35f1' => 'Address / Street Address',
            'field_047fc60' => 'Address Line 2',
            'field_a068999' => 'City',
            'field_e95ba4d' => 'Country / State / Region',
            'field_b2dcf7c' => 'Zip / Postal Code',
            'field_a8c4c14' => 'Country',
            'field_dae410a' => 'Are you allowed to work in the UK?',
            'field_f2a4f37' => 'Do you have a cleared DBS?',
            'field_0064921' => 'Emergency Contact Details Forename',
            'field_28fb8c2' => 'Surname',
            'email' => 'Email',
            'created_at' => 'Submission Date',
        ];

        return view('admin.api.job-application-view', compact('submission', 'labels'));
    }




    // Main staff list
    public function staffApplication()
    {
        $response = Http::get('https://alrushd.co.uk/wp-json/custom/v1/form-submissions/87afc1d');

        if ($response->successful()) {
            $data = collect($response->json()['submissions'])->values();
            return view('admin.api.staff-application', compact('data'));
        }

        return abort(500, 'API Fetch Failed');
    }

    // View single submission
    public function staffApplicationView($index)
    {
        $response = Http::get('https://alrushd.co.uk/wp-json/custom/v1/form-submissions/87afc1d');

        if ($response->successful()) {
            $data = collect($response->json()['submissions'])->values();

            if (!isset($data[$index])) {
                abort(404, 'Submission not found');
            }

            $submission = $data[$index];

            $labels = [
                'name' => 'Full Name',
                'email' => 'Email',
                'message' => 'Preferred Name',
                'field_a579d1c' => 'Forename',
                'field_c90264c' => 'Surname',
                'field_fa1fc8d' => 'Date of Birth',
                'field_36f8b56' => 'Gender',
                'field_facd0f4' => 'Marital Status',
                'field_6ccfce5' => 'Nationality',
                'field_926b28e' => 'Religion',
                'field_e85f923' => 'Mobile',
                'field_47d2c6a' => 'Home Phone',
                'field_0bc35f1' => 'Street Address',
                'field_047fc60' => 'Address Line 2',
                'field_a068999' => 'City',
                'field_e95ba4d' => 'State',
                'field_b2dcf7c' => 'Country',
                'field_a8c4c14' => 'Work in UK?',
                'field_dae410a' => 'DBS Cleared?',
                'field_f2a4f37' => 'Emergency First Name',
                'field_0064921' => 'Emergency Surname',
                'field_28fb8c2' => 'Postal Code',
            ];

            return view('admin.api.staff-application-view', compact('submission', 'labels'));
        }

        return abort(500, 'API Fetch Failed');
    }


    // <option value="15647">Alrushd Madrasah Course Form</option>
    // <option value="14891">Subscribe</option>
    // <option value="14889">Referral</option>
    // <option value="14881">Enquire Now</option>
    // <option value="14433">Direct Debit Form</option>
    // <option value="14242">Apply Now</option></select>
    // $response = Http::get('https://alrushd.co.uk/wp-json/custom/v1/form-submissions/f16e557');

    // if ($response->successful()) {
    //     $data = collect($response->json()['submissions'])->values();
    //     return view('admin.api.apply-now', compact('data'));
    // }

    // return abort(500, 'API Fetch Failed');




    public function applyNow(Request $request)
    {
        $form_id = 14242;
        $page    = $request->query('page', 1);
        $perPage = 20;
        $search  = $request->query('search', '');

        // 🔹 Fetch all entries from WordPress API
        $response = Http::get("https://alrushd.co.uk/wp-json/forminator/v1/all-entries/{$form_id}");
        if (!$response->successful()) {
            abort(500, 'Failed to fetch data from WordPress');
        }

        $allEntries = collect($response->json()['entries']);

        // 🔹 Sort by newest first (ID descending)
        $allEntries = $allEntries->sortByDesc('entry_id')->values();

        // 🔹 Laravel side search (all data)
        if (!empty($search)) {
            $allEntries = $allEntries->filter(function ($entry) use ($search) {
                $metaValues = implode(' ', array_values($entry['meta']));
                $searchable = $entry['entry_id'] . ' ' . $entry['date_created'] . ' ' . $metaValues;
                return str_contains(strtolower($searchable), strtolower($search));
            })->values();
        }

        // 🔹 Pagination
        $paginatedData = new LengthAwarePaginator(
            $allEntries->forPage($page, $perPage),
            $allEntries->count(),
            $perPage,
            $page,
            [
                'path'  => $request->url(),
                'query' => $request->query(),
            ]
        );

        // dd($allEntries);

        return view('admin.api.apply-now', [
            'paginatedData' => $paginatedData,
            'search'        => $search,
            'allData'       => $allEntries, // full dataset for JS search
        ]);
    }

    public function applyNowView($entry_id)
    {
        $form_id = 14242; // Form ID
        $response = Http::get("https://alrushd.co.uk/wp-json/forminator/v1/all-entries/{$form_id}");

        if (!$response->successful()) {
            abort(500, 'Failed to fetch data from WordPress');
        }

        $allEntries = collect($response->json()['entries'])->values();

        // Find entry by entry_id
        $submission = $allEntries->firstWhere('entry_id', $entry_id);

        if (!$submission) {
            abort(404, 'Submission not found');
        }

        // Decode/unserialize meta values
        $meta = $submission['meta'];
        foreach ($meta as $key => $value) {
            if (@unserialize($value) !== false || $value === 'b:0;') {
                $meta[$key] = unserialize($value);
            }
        }

        // dd($meta);

        return view('admin.api.apply-now-view', compact('submission', 'meta'));
    }

    // Online Madrasah
    public function onlineMadrasah(Request $request)
    {
        $form_id = 15647;
        $page    = $request->query('page', 1);
        $perPage = 20;
        $search  = $request->query('search', '');

        // 🔹 Fetch all entries from WordPress API
        $response = Http::get("https://alrushd.co.uk/wp-json/forminator/v1/all-entries/{$form_id}");
        if (!$response->successful()) {
            abort(500, 'Failed to fetch data from WordPress');
        }

        $allEntries = collect($response->json()['entries']);

        // 🔹 Sort by newest first (ID descending)
        $allEntries = $allEntries->sortByDesc('entry_id')->values();

        // 🔹 Laravel side search (all data)
        if (!empty($search)) {
            $allEntries = $allEntries->filter(function ($entry) use ($search) {
                $metaValues = implode(' ', array_values($entry['meta']));
                $searchable = $entry['entry_id'] . ' ' . $entry['date_created'] . ' ' . $metaValues;
                return str_contains(strtolower($searchable), strtolower($search));
            })->values();
        }

        // 🔹 Pagination
        $paginatedData = new LengthAwarePaginator(
            $allEntries->forPage($page, $perPage),
            $allEntries->count(),
            $perPage,
            $page,
            [
                'path'  => $request->url(),
                'query' => $request->query(),
            ]
        );

        // dd($allEntries);

        return view('admin.api.online-madrasah', [
            'paginatedData' => $paginatedData,
            'search'        => $search,
            'allData'       => $allEntries, // full dataset for JS search
        ]);
    }

    public function onlineMadrasahView($entry_id)
    {
        $form_id = 15647; // Form ID
        $response = Http::get("https://alrushd.co.uk/wp-json/forminator/v1/all-entries/{$form_id}");

        if (!$response->successful()) {
            abort(500, 'Failed to fetch data from WordPress');
        }

        $allEntries = collect($response->json()['entries'])->values();

        // Find entry by entry_id
        $submission = $allEntries->firstWhere('entry_id', $entry_id);

        if (!$submission) {
            abort(404, 'Submission not found');
        }

        // Decode/unserialize meta values
        $meta = $submission['meta'];
        foreach ($meta as $key => $value) {
            if (@unserialize($value) !== false || $value === 'b:0;') {
                $meta[$key] = unserialize($value);
            }
        }

        // dd($meta);

        return view('admin.api.online-madrasah-view', compact('submission', 'meta'));
    }

    // Subscribe
    public function subscribeApplication(Request $request)
    {

        // $response = Http::get('https://alrushd.co.uk/wp-json/custom/v1/form-submissions/f7c6300');
        // if ($response->successful()) {
        //     $data = $response->json();

        //     $data = collect($data['submissions'])
        //         ->sortKeysDesc()
        //         ->values();

        //     return view('admin.api.subscribe-application', compact('data'));
        // }
        // return abort(500, 'API Fetch Failed');

        $form_id = 14891;
        $page    = $request->query('page', 1);
        $perPage = 20;
        $search  = $request->query('search', '');

        // 🔹 Fetch all entries from WordPress API
        $response = Http::get("https://alrushd.co.uk/wp-json/forminator/v1/all-entries/{$form_id}");
        if (!$response->successful()) {
            abort(500, 'Failed to fetch data from WordPress');
        }

        $allEntries = collect($response->json()['entries']);

        // 🔹 Sort by newest first (ID descending)
        $allEntries = $allEntries->sortByDesc('entry_id')->values();

        // 🔹 Laravel side search (all data)
        if (!empty($search)) {
            $allEntries = $allEntries->filter(function ($entry) use ($search) {
                $metaValues = implode(' ', array_values($entry['meta']));
                $searchable = $entry['entry_id'] . ' ' . $entry['date_created'] . ' ' . $metaValues;
                return str_contains(strtolower($searchable), strtolower($search));
            })->values();
        }

        // 🔹 Pagination
        $paginatedData = new LengthAwarePaginator(
            $allEntries->forPage($page, $perPage),
            $allEntries->count(),
            $perPage,
            $page,
            [
                'path'  => $request->url(),
                'query' => $request->query(),
            ]
        );

        // dd($paginatedData);

        return view('admin.api.subscribe-application', [
            'paginatedData' => $paginatedData,
            'search'        => $search,
            'allData'       => $allEntries, // full dataset for JS search
        ]);


    }



    // public function contactApplication()
    // {
    //     $response = Http::get('https://alrushd.co.uk/wp-json/custom/v1/form-submissions/61e2aa96');

    //     if ($response->successful()) {
    //         $data = collect($response->json()['submissions'])->values();
    //         return view('admin.api.contact-application', compact('data'));
    //     }

    //     return abort(500, 'API Fetch Failed');
    // }

    // public function contactApplicationView($index)
    // {
    //     $response = Http::get('https://alrushd.co.uk/wp-json/custom/v1/form-submissions/61e2aa96');

    //     if ($response->successful()) {
    //         $data = collect($response->json()['submissions'])->values();

    //         if (!isset($data[$index])) {
    //             abort(404, 'Submission not found');
    //         }

    //         $submission = $data[$index];

    //         $labels = [
    //             'name' => 'First Name',
    //             'field_8d7dadd' => 'Last Name',
    //             'email' => 'Email',
    //             'field_2ecf37b' => 'Phone Number',
    //             'field_50a29c8' => 'Country of Residence',
    //             'field_a381c5e' => 'Country (Alt)',
    //             'field_132882f' => 'Student First Name',
    //             'field_f30ff82' => 'Student Last Name',
    //             'field_581eed7' => 'Date of Birth',
    //             'field_4d8829c' => 'Preferred Start Date',
    //             'field_f053594' => 'Help Topic',
    //             'field_1020b20' => 'Interest (UK)',
    //             'field_7e5e6c5' => 'Interest (Middle East)',
    //             'field_edcb092' => 'Interest (Asia)',
    //             'field_46e0d9a' => 'Message',
    //             'field_8c55a3c' => 'Newsletter Consent',
    //         ];

    //         return view('admin.api.contact-application-view', compact('submission', 'labels'));
    //     }

    //     return abort(500, 'API Fetch Failed');
    // }

    // Enquire Now
    public function enquireNow(Request $request)
    {
        $form_id = 14881;
        $page    = $request->query('page', 1);
        $perPage = 20;
        $search  = $request->query('search', '');

        // 🔹 Fetch all entries from WordPress API
        $response = Http::get("https://alrushd.co.uk/wp-json/forminator/v1/all-entries/{$form_id}");
        if (!$response->successful()) {
            abort(500, 'Failed to fetch data from WordPress');
        }

        $allEntries = collect($response->json()['entries']);

        // 🔹 Sort by newest first (ID descending)
        $allEntries = $allEntries->sortByDesc('entry_id')->values();

        // 🔹 Laravel side search (all data)
        if (!empty($search)) {
            $allEntries = $allEntries->filter(function ($entry) use ($search) {
                $metaValues = implode(' ', array_values($entry['meta']));
                $searchable = $entry['entry_id'] . ' ' . $entry['date_created'] . ' ' . $metaValues;
                return str_contains(strtolower($searchable), strtolower($search));
            })->values();
        }

        // 🔹 Pagination
        $paginatedData = new LengthAwarePaginator(
            $allEntries->forPage($page, $perPage),
            $allEntries->count(),
            $perPage,
            $page,
            [
                'path'  => $request->url(),
                'query' => $request->query(),
            ]
        );

        // dd($allEntries);

        return view('admin.api.enquire-now', [
            'paginatedData' => $paginatedData,
            'search'        => $search,
            'allData'       => $allEntries, // full dataset for JS search
        ]);
    }
    public function enquireNowView($entry_id)
    {
        $form_id = 14881; // Form ID
        $response = Http::get("https://alrushd.co.uk/wp-json/forminator/v1/all-entries/{$form_id}");

        if (!$response->successful()) {
            abort(500, 'Failed to fetch data from WordPress');
        }

        $allEntries = collect($response->json()['entries'])->values();

        // Find entry by entry_id
        $submission = $allEntries->firstWhere('entry_id', $entry_id);

        if (!$submission) {
            abort(404, 'Submission not found');
        }

        // Decode/unserialize meta values
        $meta = $submission['meta'];
        foreach ($meta as $key => $value) {
            if (@unserialize($value) !== false || $value === 'b:0;') {
                $meta[$key] = unserialize($value);
            }
        }

        // dd($meta);

        return view('admin.api.enquire-now-view', compact('submission', 'meta'));
    }

    // Referal
    public function referralApplication(Request $request)
    {
        $form_id = 14889;
        $page    = $request->query('page', 1);
        $perPage = 20;
        $search  = $request->query('search', '');

        // 🔹 Fetch all entries from WordPress API
        $response = Http::get("https://alrushd.co.uk/wp-json/forminator/v1/all-entries/{$form_id}");
        if (!$response->successful()) {
            abort(500, 'Failed to fetch data from WordPress');
        }

        $allEntries = collect($response->json()['entries']);

        // 🔹 Sort by newest first (ID descending)
        $allEntries = $allEntries->sortByDesc('entry_id')->values();

        // 🔹 Laravel side search (all data)
        if (!empty($search)) {
            $allEntries = $allEntries->filter(function ($entry) use ($search) {
                $metaValues = implode(' ', array_values($entry['meta']));
                $searchable = $entry['entry_id'] . ' ' . $entry['date_created'] . ' ' . $metaValues;
                return str_contains(strtolower($searchable), strtolower($search));
            })->values();
        }

        // 🔹 Pagination
        $paginatedData = new LengthAwarePaginator(
            $allEntries->forPage($page, $perPage),
            $allEntries->count(),
            $perPage,
            $page,
            [
                'path'  => $request->url(),
                'query' => $request->query(),
            ]
        );

        // dd($allEntries);

        return view('admin.api.referral-application', [
            'paginatedData' => $paginatedData,
            'search'        => $search,
            'allData'       => $allEntries, // full dataset for JS search
        ]);
    }
    public function referralApplicationView($entry_id)
    {
        $form_id = 14889; // Form ID
        $response = Http::get("https://alrushd.co.uk/wp-json/forminator/v1/all-entries/{$form_id}");

        if (!$response->successful()) {
            abort(500, 'Failed to fetch data from WordPress');
        }

        $allEntries = collect($response->json()['entries'])->values();

        // Find entry by entry_id
        $submission = $allEntries->firstWhere('entry_id', $entry_id);

        if (!$submission) {
            abort(404, 'Submission not found');
        }

        // Decode/unserialize meta values
        $meta = $submission['meta'];
        foreach ($meta as $key => $value) {
            if (@unserialize($value) !== false || $value === 'b:0;') {
                $meta[$key] = unserialize($value);
            }
        }

        // dd($meta);

        return view('admin.api.referral-application-view', compact('submission', 'meta'));
    }

    // public function referralApplication()
    // {
    //     $response = Http::get('https://alrushd.co.uk/wp-json/custom/v1/form-submissions/62a62a9a');

    //     if ($response->successful()) {
    //         $data = collect($response->json()['submissions'])->values();
    //         return view('admin.api.referral-application', compact('data'));
    //     }

    //     return abort(500, 'API Fetch Failed');
    // }

    // public function referralApplicationView($index)
    // {
    //     $response = Http::get('https://alrushd.co.uk/wp-json/custom/v1/form-submissions/62a62a9a');

    //     if ($response->successful()) {
    //         $data = collect($response->json()['submissions'])->values();

    //         if (!isset($data[$index])) {
    //             abort(404, 'Submission not found');
    //         }

    //         $submission = $data[$index];

    //         $labels = [
    //             'name' => 'First Name',
    //             'field_8d7dadd' => 'Last Name',
    //             'email' => 'Email',
    //             'field_2ecf37b' => 'Phone Number',
    //             'field_50a29c8' => 'Country of Residence',
    //             'field_a381c5e' => 'Country (Alt)',
    //             'field_132882f' => 'Student First Name',
    //             'field_f30ff82' => 'Student Last Name',
    //             'field_581eed7' => 'Date of Birth',
    //             'field_4d8829c' => 'Preferred Start Date',
    //             'field_f053594' => 'Help Topic',
    //             'field_1020b20' => 'Interest (UK)',
    //             'field_7e5e6c5' => 'Interest (Middle East)',
    //             'field_edcb092' => 'Interest (Asia)',
    //             'field_46e0d9a' => 'Message',
    //             'field_8c55a3c' => 'Newsletter Consent',
    //         ];

    //         return view('admin.api.referral-application-view', compact('submission', 'labels'));
    //     }

    //     return abort(500, 'API Fetch Failed');
    // }
}
