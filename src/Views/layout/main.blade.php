<!DOCTYPE html>
<html lang="pl">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title -->
        <title>{{ trans('installer::lang.main.title') }}</title>

        <!-- CSRF token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{ asset('vendor/installer/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/installer/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/installer/css/form-elements.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/installer/css/style.css') }}">

        <!-- Favicon icon -->
        <link rel="shortcut icon" href="{{ asset('vendor/installer/ico/favicon.png') }}">
    </head>

    <body>

    <!-- Top menu -->
    <!-- <nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">BootZard - Bootstrap Wizard Template</a>
            </div>
             Collect the nav links, forms, and other content for toggling -->
    <!-- <div class="collapse navbar-collapse" id="top-navbar-1">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <span class="li-text">
                    Put some text or
                </span>
                <a href="#"><strong>links</strong></a>
                <span class="li-text">
                    here, or some icons:
                </span>
                <span class="li-social">
                    <a href="https://www.facebook.com/pages/Azmindcom/196582707093191" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/anli_zaimi" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://plus.google.com/+AnliZaimi_azmind" target="_blank"><i class="fa fa-google-plus"></i></a>
                    <a href="https://github.com/AZMIND" target="_blank"><i class="fa fa-github"></i></a>
                </span>
            </li>
        </ul>
    </div>
    </div>
    </nav> -->

    <!-- Top content -->
    <div class="top-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>Laravel</strong> Installator</h1>
                    <div class="description">
                        <p>{{ trans('installer::lang.main.headerDesc') }}</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10 col-lg-8 form-box f1">
                    @yield('header')
                    <div class="f1-steps">
                        <div class="f1-progress">
                            <div class="f1-progress-line" data-current-step="@yield('stepNumber')" data-number-of-steps="6" ></div> <!-- style="width: 16.66%;" -->
                        </div>
                        <div class="f1-step @if(Request::is('install/start')) active @elseif(Request::is('install/packages') || Request::is('install/permissions') || Request::is('install/mainSettings') || Request::is('install/account') || Request::is('install/finish')) activated @endif">
                            <div class="f1-step-icon"><i class="fa fa-home"></i></div>
                            <p>{{ trans('installer::lang.main.start') }}</p>
                        </div>
                        <div class="f1-step @if(Request::is('install/packages')) active @elseif(Request::is('install/permissions') || Request::is('install/mainSettings') || Request::is('install/account') || Request::is('install/finish')) activated @endif">
                            <div class="f1-step-icon"><i class="fa fa-server"></i></div>
                            <p>{{ trans('installer::lang.main.packages') }}</p>
                        </div>
                        <div class="f1-step @if(Request::is('install/permissions')) active @elseif(Request::is('install/mainSettings') || Request::is('install/account') || Request::is('install/finish')) activated @endif">
                            <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                            <p>{{ trans('installer::lang.main.permissions') }}</p>
                        </div>
                        <div class="f1-step @if(Request::is('install/mainSettings')) active @elseif(Request::is('install/account') || Request::is('install/finish')) activated @endif">
                            <div class="f1-step-icon"><i class="fa fa-cog"></i></div>
                            <p>{{ trans('installer::lang.main.settings') }}</p>
                        </div>
                        <div class="f1-step @if(Request::is('install/account')) active @elseif(Request::is('install/finish')) activated @endif">
                            <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                            <p>{{ trans('installer::lang.main.account') }}</p>
                        </div>
                        <div class="f1-step @if(Request::is('install/finish')) active @endif">
                            <div class="f1-step-icon"><i class="fa fa-sign-out"></i></div>
                            <p>{{ trans('installer::lang.main.finish') }}</p>
                        </div>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ trans('installer::lang.main.error') }}</strong> - {{ session('error')}}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ trans('installer::lang.main.success') }}</strong> - {{ session('success')}}
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>
        </div>
    </div>
    <!-- End Top content -->

    <!-- Javascripts -->
    <script src="{{ asset('vendor/installer/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('vendor/installerbootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/installer/js/jquery.backstretch.min.js') }}"></script>
    <script src="{{ asset('vendor/installer/js/retina-1.1.0.min.js') }}"></script>
    <script src="{{ asset('vendor/installer/js/scripts.js') }}"></script>

    </body>
</html>