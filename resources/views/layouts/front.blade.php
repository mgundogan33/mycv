<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bootstrapdash.com/demo/live-resume/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 May 2022 10:06:36 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/vendors/%40fortawesome/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/live-resume.css')}}">
    @yield('css')
</head>

<body>
    @include('layouts.menu')

    <div class="content-wrapper">
        <aside>
            <div class="profile-img-wrapper">
                <img src="assets/images/Profile.png" alt="profile">
            </div>
            <h1 class="profile-name">Daisy Murphy</h1>
            <div class="text-center">
                <span class="badge badge-white badge-pill profile-designation">UI / UX Designer</span>
            </div>
            <nav class="social-links">
                <a href="#!" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-behance"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-dribbble"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-github"></i></a>
            </nav>
            <div class="widget">
                <h5 class="widget-title">personal information</h5>
                <div class="widget-content">
                    <p>BIRTHDAY : 15 April 1990</p>
                    <p>WEBSITE : www.example.com</p>
                    <p>PHONE : +1 123 000 4444</p>
                    <p>MAIL : your@example.com</p>
                    <p>Location : California, USA</p>
                    <button class="btn btn-download-cv btn-primary rounded-pill"> <img src="assets/images/download.svg"
                            alt="download" class="btn-img">DOWNLOAD CV </button>
                </div>
            </div>
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">LANGUAGES</h5>
                        <p>English : native</p>
                        <p>Spanish : fluent</p>
                        <p>Italian : fluent</p>
                    </div>
                </div>
            </div>
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">INTERESTS</h5>
                        <p>Video games</p>
                        <p>Finance</p>
                        <p>Basketball</p>
                        <p>Theatre</p>
                    </div>
                </div>
            </div>
        </aside>
        <main>
            @yield('content')
            <footer>
                <div class="fs-14 font-weight-600">
                    Free <a href="https://www.bootstrapdash.com/" target="_blank" class="text-dark">Bootstrap
                        dashboard templates</a> from Bootstrapdash
                </div>
            </footer>
        </main>
    </div>
    <script src="{{asset('assets/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendors/%40popperjs/core/dist/umd/popper-base.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/live-resume.js')}}"></script>
    @yield('js')
</body>


<!-- Mirrored from bootstrapdash.com/demo/live-resume/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 May 2022 10:06:40 GMT -->

</html>
