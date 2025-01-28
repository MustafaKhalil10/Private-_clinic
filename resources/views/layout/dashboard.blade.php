<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!----css3---->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">


    <!--google fonts -->
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin>
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap') }}"
        rel="stylesheet">


    <!--google material icon-->
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Material+Icons') }}"rel="stylesheet">
    <link href="{{ asset('assets_front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>

    <div class="wrapper">

        <!-------sidebar--design------------>
        <div id="sidebar">
            <x-nav />
        </div>
        <!-------end sidebar--design----------->


        <!-------page-content start----------->
        <div id="content">

            <!------top-navbar-start----------->
            <div class="top-navbar">
                <div class="xd-topbar">
                    <div class="row">
                        <!-- Menubar Section -->
                        <div class="col-2 col-md-1 col-lg-1 align-self-center">
                            <div class="xp-menubar">
                                <span class="material-icons text-white">signal_cellular_alt</span>
                            </div>
                        </div>

                        <!-- Searchbar Section -->
                        <div class="col-md-5 col-lg-3">
                            <div class="xp-searchbar">
                                <!-- يمكنك إضافة محتوى شريط البحث هنا إذا كان موجوداً -->
                            </div>
                        </div>

                        <!-- Profile Section -->
                        <div class="col-10 col-md-6 col-lg-8">
                            <div class="xp-profilebar text-right">
                                <nav class="navbar p-0">
                                    <ul class="nav navbar-nav flex-row ml-auto mt-4">
                                        <!-- Private Clinic Title -->
                                        <li class="flex-1">
                                            <div class="text-center" style="color: #02af81">
                                                <h3 style="margin-right: 145px;font-size: 30px"><span>My Clinic</span>
                                                </h3>
                                            </div>
                                        </li>
                                        <!-- My Account Link -->
                                        <li class="ml-2">
                                            <a href="{{ route('dashboard.profile.edit') }}" class="btn_Acount btn_nav">
                                                <i class="bi bi-person"></i> My Account
                                            </a>
                                        </li>
                                        <li class="out">
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn_out btn_nav">
                                                    <i class="bi bi-box-arrow-right mr-1"></i> Logout</button>
                                            </form>
                                        </li>

                                        <!-- Notifications Dropdown -->
                                        <li class="dropdown nav-item active">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <span class="material-icons">notifications</span>
                                                <span class="notification">4</span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                            </ul>
                                        </li>

                                        <!-- Help Link -->
                                        <li>
                                            <a class="nav-link" href="#">
                                                <span class="material-icons">question_answer</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Breadcrumb Section -->
                    <div class="xp-breadcrumbbar text-center">
                        <ol class="breadcrumb">
                            @section('breadcrumb')
                                <li class="breadcrumb-item active" aria-current="page">
                                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                                </li>
                            @show
                        </ol>
                    </div>
                </div>
            </div>

            <!------top-navbar-end----------->


            <!------main-content-start----------->
            @yield('content')
            <!------main-content-end----------->


            <!----footer-design------------->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="footer-in">
                        <p class="mb-0">&copy 2025 Vishweb Design . All Rights Reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $(".xp-menubar").on('click', function() {
                $("#sidebar").toggleClass('active');
                $("#content").toggleClass('active');
            });

            $('.xp-menubar,.body-overlay').on('click', function() {
                $("#sidebar,.body-overlay").toggleClass('show-nav');
            });
        });
    </script>
    @stack('scripts')

</body>

</html>
