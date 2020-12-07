<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light bg-faded navbar-static-top dash-navbar-top nb-visible">
        <button class="nb-btn-toggle">
            <span class="fa fa-bars"></span>
        </button>
    </nav>
    <div class="dash-navbar-left nb-visible">
        <a class="navbar-brand" href="#">Fitapp admin panel</a>
        <p class="nb-nav-title">Excercise</p>
        <ul class="nb-nav">
            <li>
                <a class="collapsed" data-toggle="collapse" href="#excercise" aria-expanded="false" aria-controls="excercise">
                    <span class="fa fa-child nb-link-icon"></span>
                    <span class="nb-link-text">Manage Excercises</span>
                    <span class="fa fa-angle-up nb-btn-sub-collapse"></span>
                </a>
                <ul class="nb-sub-one collapse" id="excercise">
                    <li>
                      <a href="{{route('excercises')}}">
                        <span class="fa fa-slack nb-link-icon"></span>
                        <span class="nb-link-text">All Excercise</span>
                      </a>
                    </li>
                     <li>
                      <a href="{{route('add-excercise')}}">
                        <span class="fa fa-slack nb-link-icon"></span>
                        <span class="nb-link-text">Add Excercise</span>
                      </a>
                    </li>
                </ul>
            </li>
        </ul>
        <p class="nb-nav-title">Workout</p>
        <ul class="nb-nav">
            <li>
                <a class="collapsed" data-toggle="collapse" href="#workout" aria-expanded="false" aria-controls="workout">
                    <span class="fa fa-calendar-check-o nb-link-icon"></span>
                    <span class="nb-link-text">Manage workouts</span>
                    <span class="fa fa-angle-up nb-btn-sub-collapse"></span>
                </a>
                <ul class="nb-sub-one collapse" id="workout">
                    <li>
                      <a href="{{route('fitnessplan')}}">
                        <span class="fa fa-slack nb-link-icon"></span>
                        <span class="nb-link-text">All workouts</span>
                      </a>
                    </li>
                     <li>
                      <a href="{{route('add-fitnessplan')}}">
                        <span class="fa fa-slack nb-link-icon"></span>
                        <span class="nb-link-text">Add workout</span>
                      </a>
                    </li>
                </ul>
            </li>
        </ul>
        <p class="nb-nav-title">Tags</p>
        <ul class="nb-nav">
            <li>
                <a class="collapsed" data-toggle="collapse" href="#tags" aria-expanded="false" aria-controls="tags">
                    <span class="fa fa-tag nb-link-icon"></span>
                    <span class="nb-link-text">Manage tags</span>
                    <span class="fa fa-angle-up nb-btn-sub-collapse"></span>
                </a>
                <ul class="nb-sub-one collapse" id="tags">
                    <li>
                      <a href="{{Route('tags')}}">
                        <span class="fa fa-slack nb-link-icon"></span>
                        <span class="nb-link-text">All tags</span>
                      </a>
                    </li>
                     <li>
                      <a href="{{Route('add-tag')}}">
                        <span class="fa fa-slack nb-link-icon"></span>
                        <span class="nb-link-text">Add tag</span>
                      </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div> <!-- /.dash-navbar-left -->


    <div class="content-wrap nb-visible" data-effect="nb-push">
      <div class="container-fluid">
        <div class="row">
            @yield('content')
         <!-- End of your content -->
        </div>
      </div>
    </div> <!-- /.content-wrap --></body>
</html>
