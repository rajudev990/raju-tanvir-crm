<footer id="footer" class="footer dark-background {{ Route::is('step1') || Route::is('step2') || Route::is('step3') || Route::is('step4') || Route::is('step5') || Route::is('step6') || Route::is('step7') || Route::is('step8') ? 'd-none' : ''  }}">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                    <img src="{{ asset('frontend/') }}/assets/img/logo.png" alt="">
                </a>
                <div class="footer-contact">
                    <p>Address: Unit 8, Church Road Studios 62 Church Road London E12 6AF</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>+442036330757</span></p>
                    <p><strong>Email:</strong> <span>admin@alrushd.co.uk</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href="https://www.facebook.com/alrushdindependentschool/" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.youtube.com/channel/UCY2LpEsW1zJm2mDC8aRLtGg" target="_blank"><i class="bi bi-youtube"></i></a>
                    <a href="https://www.instagram.com/al_rushd_academy/" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/alrushdindependentonlineschool/?originalSubdomain=uk" target="_blank"><i class="bi bi-linkedin"></i></a>
                     <a href="https://www.tiktok.com/@alrushd" target="_blank"><i class="bi bi-tiktok"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>About Us</h4>
                <ul>
                    <li><a href="https://alrushd.co.uk/about-us/" target="_blank">About Us</a></li>
                    <li><a href="https://alrushd.co.uk/how-we-teach/" target="_blank">How We Teach</a></li>
                    <li><a href="https://alrushd.co.uk/lesson-recordings/" target="_blank">Lesson Recordings</a></li>
                    <li><a href="https://alrushd.co.uk/character-development/" target="_blank">Character Development</a></li>
                    <li><a href="https://alrushd.co.uk/international-recognition/" target="_blank">International Recognition</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Book An Admission</h4>
                <ul>
                    <li><a href="https://alrushd.co.uk/admission-process/" target="_blank">Admission Process</a></li>
                    <li><a href="https://alrushd.co.uk/fees/" target="_blank">Fees</a></li>
                    <li><a href="https://alrushd.co.uk/apply-now/" target="_blank">Apply Now</a></li>
                    <li><a href="https://alrushd.co.uk/contact/" target="_blank">Contact Us</a></li>

                </ul>
            </div>
            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Academic Programs</h4>
                <ul>
                    <li><a href="https://alrushd.co.uk/hifz-hifdh-programme/" target="_blank">Hifz – Hifdh Programme</a></li>
                    <li><a href="https://alrushd.co.uk/al-rushd-madrasah/" target="_blank">Al-Rushd Madrasah</a></li>
                    <li><a href="https://alrushd.co.uk/islamic-curriculum/" target="_blank">Islamic Curriculum</a></li>
                    <li><a href="https://alrushd.co.uk/grade-placement/" target="_blank">Grade Placement</a></li>
                    <li><a href="https://alrushd.co.uk/timetable/" target="_blank">Timetable</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Working with us</h4>
                <ul>
                    <li><a href="https://alrushd.co.uk/principals-welcome/" target="_blank">Principals Welcome</a></li>
                    <li><a href="https://alrushd.co.uk/job-application-form-2/" target="_blank">Job Application Form</a></li>
                    <li><a href="https://alrushd.co.uk/staff-application-form/" target="_blank">Staff Application Form</a></li>
                    <li><a href="https://alrushd.co.uk/careers/" target="_blank">Careers</a></li>
                    <li><a href="https://alrushd.co.uk/teacher-training-policy/" target="_blank">Teacher Training Policy</a></li>
                </ul>
            </div>


        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>Copyright {{  date('Y') }} © All Right Reserved by Al-rushd Online School</p>
    </div>

</footer>