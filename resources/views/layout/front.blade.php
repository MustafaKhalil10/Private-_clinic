<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets_front/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets_front/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets_front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_front/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_front/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_front/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_front/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets_front/css/main.css') }}" rel="stylesheet">

    <!--google material icon-->
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Material+Icons') }}"rel="stylesheet">
    @stack('styles')

</head>

<body class="index-page">

    <header id="header" class="header sticky-top">

        <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a
                            href="mailto:contact@example.com">{{ $contact->clinic_email }}</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ $contact->clinic_phone }}</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">

                    @if (Auth::check())
                        <a href="{{ route('front.profile.edit') }}" class="btn_Acount btn_nav">
                            <i class="bi bi-person"></i> My Acount</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn_out btn_nav">
                                <i class="bi bi-box-arrow-right"></i> logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn_log btn_nav">
                            <i class="bi bi-box-arrow-in-right"></i> Login</a>
                    @endif

                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>


                </div>

            </div>
        </div><!-- End Top Bar -->

        <div class="branding d-flex align-items-center">
            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center me-auto">
                    <h1 class="sitename d-none d-sm-block">{{ $contact->clinic_name }}</h1>
                </a>

                <x-nav2 />
                <a class="cta-btn" id="sss" href="{{ route('front.appointments.index') }}">Make an
                    Appointment</a>

            </div>
        </div>
    </header>

    <main class="main">
        <!-- Main Section -->
        @yield('content')
        <!-- End Main Section -->
    </main>

    <footer id="footer" class="footer light-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">Medilab</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>{{ $contact->clinic_address }}</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>{{ $contact->clinic_phone }}</span></p>
                        <p><strong>Email:</strong> <span>{{ $contact->clinic_email }}</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Hic solutasetp</h4>
                    <ul>
                        <li><a href="#">Molestiae accusamus iure</a></li>
                        <li><a href="#">Excepturi dignissimos</a></li>
                        <li><a href="#">Suscipit distinctio</a></li>
                        <li><a href="#">Dilecta</a></li>
                        <li><a href="#">Sit quas consectetur</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Nobis illum</h4>
                    <ul>
                        <li><a href="#">Ipsam</a></li>
                        <li><a href="#">Laudantium dolorum</a></li>
                        <li><a href="#">Dinera</a></li>
                        <li><a href="#">Trodelas</a></li>
                        <li><a href="#">Flexo</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Medilab</strong> <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets_front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets_front/vendor/php-email-form/validate.js"></script>
    <script src="assets_front/vendor/aos/aos.js"></script>
    <script src="assets_front/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets_front/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets_front/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets_front/js/main.js"></script>

    <!-- Dark & Sun -->
    <script>
        {{-- Dark & Sun  --}}
        var icon = document.getElementById('icon');

        icon.onclick = function() {
            document.body.classList.toggle('moon');
            if (document.body.classList.contains('moon')) {
                icon.src = "{{ asset('assets_front/img/icon/sun.png') }}";
            } else {
                icon.src = "{{ asset('assets_front/img/icon/moon.png') }}";
            }
        }
    </script>
    @stack('scripts')
</body>

</html>
