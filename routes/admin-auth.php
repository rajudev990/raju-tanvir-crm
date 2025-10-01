<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdmissionStudentController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\CourseFeeController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\GroupYearController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\QualificationController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\CuponController;
use App\Http\Controllers\Admin\DebitController;
use App\Http\Controllers\Admin\EnquireController;
use App\Http\Controllers\Admin\MeetSpeakerController;
use App\Http\Controllers\Admin\MettingFormController;
use App\Http\Controllers\Admin\OpenEventController;
use App\Http\Controllers\Admin\OpenEventItemController;
use App\Http\Controllers\Admin\OpenEventSubmissionFormController;
use App\Http\Controllers\Admin\ReferralController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\TimeTableController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StaffApplicationController;
use App\Http\Controllers\Admin\StudentCourseController;
use App\Http\Controllers\Admin\StudentGroupController;
use App\Http\Controllers\Admin\StudentLanguageController;
use App\Http\Controllers\Admin\StudentPackageController;
use App\Http\Controllers\Admin\StudentSubjectController;
use App\Http\Controllers\Admin\StudentYearController;
use App\Http\Controllers\Admin\WordPressApiController;
use App\Models\StudentSubject;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest:admin')->group(function () {

    Route::get('register', [RegisterController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);

});

Route::prefix('admin')->name('admin.')
// ->middleware('auth:admin')
->middleware(['auth:admin', 'admin.only', 'admin.has.role'])
->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');


    Route::get('/profile/settings', [AdminProfileController::class, 'settings'])->name('profile.settings');
    Route::put('/profile/settings', [AdminProfileController::class, 'updateSettings'])->name('profile.settings.update');

    Route::get('/change-password', [AdminProfileController::class, 'changePassword'])->name('change.password');
    Route::put('/change-password', [AdminProfileController::class, 'updatePassword'])->name('change.password.update');

    Route::resource('settings',SettingController::class);

    // Role Management
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);

    // Group
    Route::resource('coupons',CuponController::class);
    Route::resource('time-tables',TimeTableController::class);

    // Form Submission
    Route::resource('staff-applications-form',StaffApplicationController::class);
    Route::post('/staff-applications-form/status-update', [StaffApplicationController::class, 'updateStatus'])->name('staff-applications-form.status.update');

    // Metting
    Route::resource('metting-form',MettingFormController::class);

    // Debit Forms
    Route::resource('debit-forms',DebitController::class);

    // Enquire
    Route::resource('enquires',EnquireController::class);
    Route::delete('enquires/delete/{id}',[EnquireController::class,'destroy'])->name('enquires.delete');
    // Referral
    Route::resource('referrals',ReferralController::class);
    Route::delete('referrals/delete/{id}',[EnquireController::class,'destroy'])->name('referrals.delete');



    Route::resource('groups',GroupController::class);
    Route::resource('package',PackageController::class);
    Route::get('/group/{group_id}/packages', [PackageController::class, 'getPackagesByGroup']);


    Route::resource('plans',PlanController::class);

    Route::resource('languages',LanguageController::class);
    Route::resource('subjects',SubjectController::class);
    Route::resource('group-years',GroupYearController::class);
    
    Route::resource('qualifications',QualificationController::class);
    Route::get('/group-year/{id}/qualifications', [QualificationController::class, 'getQualificationsByGroupYear']);
    


    Route::resource('course-fees',CourseFeeController::class);

    Route::resource('admission-student-list',AdmissionStudentController::class);


    Route::get('job-applications',[WordPressApiController::class,'jobApplication'])->name('job-applications');
    Route::get('/job-applications/view/{id}', [WordPressApiController::class, 'jobApplicationView'])->name('job.application.view');





    Route::get('staff-applications',[WordPressApiController::class,'staffApplication'])->name('staff-applications');
    Route::get('staff-applications/view/{index}', [WordPressApiController::class, 'staffApplicationView'])->name('staff-applications.view');


    Route::get('apply-now',[WordPressApiController::class,'applyNow'])->name('apply-now');
    Route::get('apply-now/view/{index}', [WordPressApiController::class, 'applyNowView'])->name('apply-now.view');

    Route::get('online-madrasah',[WordPressApiController::class,'onlineMadrasah'])->name('online-madrasah');
    Route::get('online-madrasah/view/{index}', [WordPressApiController::class, 'onlineMadrasahView'])->name('online-madrasah.view');



    Route::get('subscribe-applications',[WordPressApiController::class,'subscribeApplication'])->name('subscribe-applications');


    Route::get('enquire-now',[WordPressApiController::class,'enquireNow'])->name('enquire-now');
    Route::get('enquire-now/view/{index}', [WordPressApiController::class, 'enquireNowView'])->name('enquire-now.view');


    Route::get('referral-applications',[WordPressApiController::class,'referralApplication'])->name('referral-applications');
    Route::get('referral-applications/view/{index}', [WordPressApiController::class, 'referralApplicationView'])->name('referral-applications.view');
    
    // Open Event
    Route::resource('open-events',OpenEventController::class);
    Route::resource('open-event-items',OpenEventItemController::class);
    Route::resource('meet-speakers',MeetSpeakerController::class);
    Route::resource('open-event-form',OpenEventSubmissionFormController::class);


    // Student
    Route::resource('student-groups',StudentGroupController::class);
    Route::resource('student-years',StudentYearController::class);
    Route::resource('student-language',StudentLanguageController::class);
    Route::resource('student-subject',StudentSubjectController::class);
    Route::resource('student-package',StudentPackageController::class);
    Route::resource('student-course',StudentCourseController::class);
    Route::get('/get-years/{group_id}', [StudentCourseController::class, 'getYears']);


    Route::resource('student-school',SchoolController::class);

    






});