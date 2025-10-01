<ul class="sidebar-menu" id="sidebar-menu">

    @canany(['view dashboard'])
    <li>
        <a href="{{ route('admin.dashboard') }}">
            <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
            <span>Dashboard</span>
        </a>
    </li>
    @endcanany

    <li class="sidebar-menu-group-title">Application</li>

    @canany(['view role', 'view user'])
    <li class="dropdown">
        <a href="javascript:void(0)">
            <iconify-icon icon="mdi:account-cog" class="menu-icon"></iconify-icon>
            <span>User Management</span>
        </a>
        <ul class="sidebar-submenu">
            @can('view role')
            <li>
                <a href="{{ route('admin.roles.index') }}">
                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Role List
                </a>
            </li>
            @endcan

            @can('create role')
            <li>
                <a href="{{ route('admin.roles.create') }}">
                    <i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Role Create
                </a>
            </li>
            @endcan

            @can('view user')
            <li>
                <a href="{{ route('admin.users.index') }}">
                    <i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Users List
                </a>
            </li>
            @endcan

            @can('create user')
            <li>
                <a href="{{ route('admin.users.create') }}">
                    <i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> User Create
                </a>
            </li>
            @endcan
        </ul>
    </li>
    @endcanany


    @canany(['view group', 'view package','view plan' ,'view languages'])
    <li class="dropdown">
        <a href="javascript:void(0)">
            <iconify-icon icon="mdi:account-cog" class="menu-icon"></iconify-icon>
            <span>Package</span>
        </a>
        <ul class="sidebar-submenu">
            @can('view group')
            <li>
                <a href="{{ route('admin.groups.index') }}">
                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Group List
                </a>
            </li>
            @endcan

            @can('view package')
            <li>
                <a href="{{ route('admin.package.index') }}">
                    <i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Package List
                </a>
            </li>
            @endcan

            @can('view plan')
            <li>
                <a href="{{ route('admin.plans.index') }}">
                    <i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Plan List
                </a>
            </li>
            @endcan

            @can('view languages')
            <li>
                <a href="{{ route('admin.languages.index') }}">
                    <i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Languages
                </a>
            </li>
            @endcan

            @can('view subjects')
            <li>
                <a href="{{ route('admin.subjects.index') }}">
                    <i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Subjects
                </a>
            </li>
            @endcan

            @can('view group')
            <li>
                <a href="{{ route('admin.time-tables.index') }}">
                    <i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Time Table
                </a>
            </li>
            @endcan

            @can('view group')
            <li>
                <a href="{{ route('admin.group-years.index') }}">
                    <i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Group Year
                </a>
            </li>
            @endcan

            @can('view qualifications')
            <li>
                <a href="{{ route('admin.qualifications.index') }}">
                    <i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Qualifications
                </a>
            </li>
            @endcan


            @can('view coursefee')
            <li>
                <a href="{{ route('admin.course-fees.index') }}">
                    <i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Course Fee
                </a>
            </li>
            @endcan

            @can('view coupon')
            <li>
                <a href="{{ route('admin.coupons.index') }}">
                    <i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Coupons
                </a>
            </li>
            @endcan


        </ul>
    </li>
    @endcanany


    @can('view student')
    <li>
        <a href="{{ route('admin.admission-student-list.index') }}">
            <iconify-icon icon="mdi:account-school-outline" class="menu-icon"></iconify-icon>
            <span>Admission Student List</span>
        </a>
    </li>
    @endcan

    <li class="dropdown">
        <a href="javascript:void(0)">
            <iconify-icon icon="mdi:calendar-month" class="menu-icon" title="Open Events"></iconify-icon>
            <span>Open Events</span>
        </a>
        <ul class="sidebar-submenu">
            <li>
                <a href="{{ route('admin.open-events.index') }}">
                    <iconify-icon icon="mdi:calendar-star" class="menu-icon"></iconify-icon>
                    <span>Open Events</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.open-event-items.index') }}">
                    <iconify-icon icon="mdi:format-list-bulleted" class="menu-icon"></iconify-icon>
                    <span>Open Event Items</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.meet-speakers.index') }}">
                    <iconify-icon icon="mdi:account-voice" class="menu-icon"></iconify-icon>
                    <span>Meet Speakers</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.open-event-form.index') }}">
                    <iconify-icon icon="mdi:form-select" class="menu-icon" title="Form Submissions"></iconify-icon>
                    <span>Submissions Form</span>
                </a>
            </li>
        </ul>
    </li>


    <li class="dropdown">
        <a href="javascript:void(0)">
            <iconify-icon icon="mdi:school-outline" class="menu-icon" title="Admission"></iconify-icon>
            <span>Admission Form</span>
        </a>
        <ul class="sidebar-submenu">
            <li>
                <a href="{{ route('admin.student-groups.index') }}">
                    <iconify-icon icon="mdi:account-group-outline" class="menu-icon"></iconify-icon>
                    <span>Group</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.student-years.index') }}">
                    <iconify-icon icon="mdi:calendar-clock" class="menu-icon"></iconify-icon>
                    <span>Year</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.student-language.index') }}">
                    <iconify-icon icon="mdi:translate" class="menu-icon"></iconify-icon>
                    <span>Language</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.student-subject.index') }}">
                    <iconify-icon icon="mdi:book-open-page-variant-outline" class="menu-icon"></iconify-icon>
                    <span>Subject</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.student-package.index') }}">
                    <iconify-icon icon="mdi:package-variant-closed" class="menu-icon"></iconify-icon>
                    <span>Package</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.student-course.index') }}">
                    <iconify-icon icon="mdi:book-open-variant" class="menu-icon"></iconify-icon>
                    <span>Course</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.student-school.index') }}">
                    <iconify-icon icon="mdi:school" class="menu-icon"></iconify-icon>
                    <span>School</span>
                </a>
            </li>


        </ul>
    </li>




    <li class="dropdown">
        <a href="javascript:void(0)">
            <iconify-icon icon="mdi:form-select" class="menu-icon" title="Form Submissions"></iconify-icon>
            <span>Form Submissions</span>
        </a>
        <ul class="sidebar-submenu">
            @can('view staff')
            <li>
                <a href="{{ route('admin.staff-applications-form.index') }}">
                    <iconify-icon icon="ic:baseline-person" class="menu-icon"></iconify-icon>
                    <span>Staff Application Form</span>
                </a>
            </li>
            @endcan
            <li>
                <a href="{{ route('admin.metting-form.index') }}">
                    <iconify-icon icon="ic:baseline-meeting-room" class="menu-icon"></iconify-icon>
                    <span>Metting Form</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.debit-forms.index') }}">
                    <iconify-icon icon="mdi:cash" class="menu-icon" style="font-size:24px;"></iconify-icon>
                    <span>Debit Forms</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.enquires.index') }}">
                    <iconify-icon icon="mdi:clipboard-text-outline" class="menu-icon" style="font-size:24px;"></iconify-icon>
                    <span>Enquire Now</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.referrals.index') }}">
                    <iconify-icon icon="mdi:handshake-outline" class="menu-icon" style="font-size:24px;"></iconify-icon>
                    <span>Referral</span>
                </a>
            </li>
        </ul>
    </li>


    <li class="dropdown">
        <a href="javascript:void(0)">
            <iconify-icon icon="mdi:form-select" class="menu-icon" title="Form Submissions"></iconify-icon>
            <span>Form Applications</span>
        </a>
        <ul class="sidebar-submenu">
            @can('view job')
            <li>
                <a href="{{ route('admin.job-applications') }}">
                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Job Applications
                </a>
            </li>
            @endcan
            <!-- @can('view staff')
            <li>
                <a href="{{ route('admin.staff-applications') }}">
                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Staff Applications
                </a>
            </li>
              @endcan -->
            @can('view apply')
            <li>
                <a href="{{ route('admin.apply-now') }}">
                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Apply Now
                </a>
            </li>
            @endcan

            @can('view apply')
            <li>
                <a href="{{ route('admin.online-madrasah') }}">
                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Online Madrasah
                </a>
            </li>
            @endcan

            @can('view enquire')
            <li>
                <a href="{{ route('admin.enquire-now') }}">
                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Enquire Now
                </a>
            </li>
            @endcan

            @can('view referral')
            <li>
                <a href="{{ route('admin.referral-applications') }}">
                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Referral
                </a>
            </li>
            @endcan

            @can('view subscribe')
            <li>
                <a href="{{ route('admin.subscribe-applications') }}">
                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Subscribe
                </a>
            </li>
            @endcan




        </ul>
    </li>

    @can('view setting')
    <li>
        <a href="{{ route('admin.settings.index') }}">
            <iconify-icon icon="solar:settings-outline" class="menu-icon"></iconify-icon>
            <span>Settings</span>
        </a>
    </li>
    @endcan



</ul>