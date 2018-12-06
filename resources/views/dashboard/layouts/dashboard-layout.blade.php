<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/materialize/css/materialize.min.css') }}" media="screen,projection"/>
    <!-- Bootstrap Styles-->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet"/>
    <!-- FontAwesome Styles-->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet"/>
    <!-- Morris Chart Styles-->
    <link href="{{ asset('assets/js/morris/morris-0.4.3.min.css') }}" rel="stylesheet"/>
    <!-- Custom Styles-->
    <link href="{{ asset('assets/css/custom-styles.css') }}" rel="stylesheet"/>
    <!-- Loader-->
    <link href="{{ asset('assets/css/dimmer.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/loader.min.css') }}" rel="stylesheet"/>
    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="{{ asset('assets/js/Lightweight-Chart/cssCharts.css') }}">

</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse"
                    data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand waves-effect waves-dark" href="{{ url('dashboard') }}"><i class="large material-icons">track_changes</i>
                <strong>milano mailing</strong></a>

            <div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i
                        class="fa fa-user fa-fw"></i> <b>{{ Auth::user()->name }} </b> <i
                        class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </nav>
    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="{{ url('dashboard/profile') }}"><i class="fa fa-user fa-fw"></i> My Profile</a>
        </li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!--/. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a class="@if(Route::current()->getName() == 'dashboard') active-menu @endif waves-effect waves-dark" href="{{ route('dashboard') }}"><i class="fa fa-desktop"></i>
                        Dashboard</a>
                </li>
                <li>
                    <a href="{{ url('dashboard/campaigns') }}" class="@if(Route::current()->getName() == 'campaigns') active-menu @endif waves-effect waves-dark"><i class="fa fa-envelope"></i> Campaigns</a>
                </li>
                <li>
                    <a href="{{ url('dashboard/subscribers') }}" class="@if(Route::current()->getName() == 'subscribers') active-menu @endif waves-effect waves-dark"><i class="fa fa-users"></i> Subscribers</a>
                </li>
                <li>
                    <a href="{{ url('dashboard/templates') }}" class="@if(Route::current()->getName() == 'templates') active-menu @endif waves-effect waves-dark"><i class="fa fa-pencil-square-o"></i> Templates</a>
                </li>

                <li>
                    <a href="{{ url('dashboard/schedules') }}" class="@if(Route::current()->getName() == 'schedules') active-menu @endif waves-effect waves-dark"><i class="fa fa-calendar"></i> Schedules</a>
                </li>
                <li>
                    <a href="{{ url('dashboard/faq') }}" class="@if(Route::current()->getName() == 'faq') active-menu @endif waves-effect waves-dark"><i class="fa fa-question-circle"></i> FAQ</a>
                </li>
            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->

    @yield('page')
    <div class="ui active page dimmer" id="dimmer" style="display: none;">
        <div class="ui big text loader">Loading</div>
    </div>
</div>
<!-- /. WRAPPER  -->


<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="{{ asset('assets/js/jquery-1.10.2.js') }}"></script>

<!-- Bootstrap Js -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/materialize/js/materialize.min.js') }}"></script>

<!-- Metis Menu Js -->
<script src="{{ asset('assets/js/jquery.metisMenu.js') }}"></script>
<!-- Morris Chart Js -->
<script src="{{ asset('assets/js/morris/raphael-2.1.0.min.js') }}"></script>
<script src="{{ asset('assets/js/morris/morris.js') }}"></script>


<script src="{{ asset('assets/js/easypiechart.js') }}"></script>
<script src="{{ asset('assets/js/easypiechart-data.js') }}"></script>

<script src="{{ asset('assets/js/Lightweight-Chart/jquery.chart.js') }}"></script>

<!-- DATA TABLE SCRIPTS -->
<script src="{{ asset('assets/js/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/js/dataTables/dataTables.bootstrap.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });


</script>



<!-- Custom Js -->
<script src="{{ asset('assets/js/custom-scripts.js') }}"></script>
</body>
</html>
