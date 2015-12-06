<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
    @if (Route::is('home'))
        AzghaseAhlam - Welcome
    @else
        @yield('title') - AzghseAhlam
    @endif
    </title>

    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <a class="navbar-brand navbar-right pull-right" href="{{ route('home') }}">اضغاث احلام</a>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#main-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('about') }}">درباره</a></li>
                <li><a href="{{ route('contact') }}">تماس</a></li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
