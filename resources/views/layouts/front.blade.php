<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bootstrapdash.com/demo/live-resume/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 May 2022 10:06:36 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/%40fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/live-resume.css') }}">
    @yield('css')
</head>

<body>
    @include('layouts.menu')

    <div class="content-wrapper">
        <aside>
            <div class="profile-img-wrapper">
                <img src="{{ 'storage/image/' . $personal->image }}" alt="{{ $personal->full_name }}" >
            </div>
            <h1 class="profile-name">{{ $personal->full_name }}</h1>
            <div class="text-center">
                <span class="badge badge-white badge-pill profile-designation">{{ $personal->task_name }}</span>
            </div>


            <nav class="social-links">
                @foreach ($socialMediaData as $item)
                    <a href="{{$item->link ? $item->link : 'javascript:void(0)' }}" target="_blank" title="{{$item->name}}" class="social-link">
                    {!! $item->icon !!}
                    </a>
                @endforeach
            </nav>
            <div class="widget">
                <h5 class="widget-title">KİŞİSEL BİLGİLER</h5>
                <div class="widget-content">
                    <p>Doğum Tarihi : {{$personal->birthday}}</p>
                    <p>WEBSITE : {{$personal->website}}</p>
                    <p>Telefon : {{$personal->phone}}</p>
                    <p>Mail : {{$personal->mail}}</p>
                    <p>Adres : {{$personal->address}}</p>
                    <a href="{{asset('storage/cv/'.$personal->cv)}}" target="_blank" class="btn btn-download-cv btn-primary rounded-pill">
                        <img src="{{asset('assets/images/download.svg')}}"alt="download" class="btn-img">Özgeçmişimi İndir </a>
                </div>
            </div>
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">DİLLER</h5>
                      {!! $personal->languages !!}
                    </div>
                </div>
            </div>
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">HOBİLER</h5>
                       {!! $personal->interests !!}
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
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/%40popperjs/core/dist/umd/popper-base.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/live-resume.js') }}"></script>
    @yield('js')
</body>


<!-- Mirrored from bootstrapdash.com/demo/live-resume/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 May 2022 10:06:40 GMT -->

</html>
