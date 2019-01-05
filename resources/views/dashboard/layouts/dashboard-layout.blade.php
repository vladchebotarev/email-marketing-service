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
    @if(Request::is('dashboard/campaigns/send-campaign'))
        <link rel="stylesheet" href="{{ asset('assets/materialize/css/materialize.clockpicker.css') }}"/>
@endif
<!-- Bootstrap Styles-->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet"/>
    <!-- FontAwesome Styles-->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet"/>
@if(Request::is('dashboard'))
    <!-- Morris Chart Styles-->
        <link href="{{ asset('assets/js/morris/morris-0.4.3.min.css') }}" rel="stylesheet"/>
@endif
<!-- Custom Styles-->
    <link href="{{ asset('assets/css/custom-styles.css') }}" rel="stylesheet"/>
    <!-- Loader-->
    <link href="{{ asset('assets/semantic-ui/css/dimmer.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/semantic-ui/css/loader.min.css') }}" rel="stylesheet"/>

    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>

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
            <a class="navbar-brand waves-effect waves-dark" href="{{ url('dashboard') }}"><i
                    class="large material-icons">track_changes</i>
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
    <ul id="dropdown1" class="dropdown-content dropdown-content-navbar">
        <li><a href="{{ url('dashboard/profile') }}"><i class="fa fa-user fa-fw"></i> My Profile</a>
        </li>
        <li><a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                    <a class="@if(Route::current()->getName() == 'dashboard') active-menu @endif waves-effect waves-dark"
                       href="{{ route('dashboard') }}"><i class="fa fa-desktop"></i>
                        Dashboard</a>
                </li>
                <li>
                    <a href="{{ url('dashboard/campaigns') }}"
                       class="@if(Route::current()->getName() == 'campaigns') active-menu @endif waves-effect waves-dark"><i
                            class="fa fa-envelope"></i> Campaigns</a>
                </li>
                <li>
                    <a href="{{ url('dashboard/subscribers') }}"
                       class="@if(Route::current()->getName() == 'subscribers') active-menu @endif waves-effect waves-dark"><i
                            class="fa fa-users"></i> Subscribers</a>
                </li>
                <li>
                    <a href="{{ url('dashboard/templates') }}"
                       class="@if(Route::current()->getName() == 'templates') active-menu @endif waves-effect waves-dark"><i
                            class="fa fa-pencil-square-o"></i> Templates</a>
                </li>

                {{--<li>
                    <a href="{{ url('dashboard/schedules') }}"
                       class="@if(Route::current()->getName() == 'schedules') active-menu @endif waves-effect waves-dark"><i
                            class="fa fa-calendar"></i> Schedules</a>
                </li>
                <li>
                    <a href="{{ url('dashboard/faq') }}"
                       class="@if(Route::current()->getName() == 'faq') active-menu @endif waves-effect waves-dark"><i
                            class="fa fa-question-circle"></i> FAQ</a>
                </li>--}}
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

{{--<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>--}}

<script src="{{ asset('assets/materialize/js/materialize.min.js') }}"></script>
@if(Request::is('dashboard/campaigns/send-campaign'))
    <script src="{{ asset('assets/materialize/js/materialize.clockpicker.js') }}"></script>
@endif
{{--<!-- Metis Menu Js -->
<script src="{{ asset('assets/js/jquery.metisMenu.js') }}"></script>--}}

@if(Request::is('dashboard'))
    <!-- Morris Chart Js -->
    <script src="{{ asset('assets/js/morris/raphael-2.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/morris/morris.js') }}"></script>
@endif

<!-- DATA TABLE SCRIPTS -->
<script src="{{ asset('assets/js/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/js/dataTables/dataTables.bootstrap.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#dataTable-simple').dataTable();

        $('#dataTable-subscribers').dataTable({
            "columnDefs": [
                {"searchable": false, "targets": 4}
            ],
            "order": [[3, "desc"]]
        });

        $('#dataTable-campaigns').dataTable({
            "columnDefs": [
                {"searchable": false, "targets": 5}
            ],
            "order": [[4, "desc"]]
        });
    });
</script>

@if(Request::is('dashboard/campaigns/send-campaign'))
    <script>
        $(document).ready(function () {
            $('input.subject-autocomplete').autocomplete({
                data: {
                    "MilanoDoors: Sneak Peek of our 2019 European Collection. Exterior, Interior, Closet/Sliding Doors": null,
                    "Milcasa: Sneak Peek of our 2019 European Collection. Exterior, Interior, Closet/Sliding Doors": null,
                },
            });
            $('input.from-name-autocomplete').autocomplete({
                data: {
                    "Milanodoors": null,
                    "Milcasa": null,
                },
            });
        });

        $(document).ready(function () {
            var date = new Date();
            $('.datepicker').pickadate({
                format: 'yyyy-mm-dd',
                min: true, //min today
                clear: '',
                close: 'OK',
            });
        });

        $('.timepicker').pickatime({
            default: 'now', // Set default time: 'now', '1:30AM', '16:30'
            fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
            twelvehour: false, // Use AM/PM or 24-hour format
            donetext: 'OK', // text for done-button
            cleartext: 'Clear', // text for clear-button
            canceltext: 'Cancel', // Text for cancel-button,
            container: undefined, // ex. 'body' will append picker to body
            autoclose: true,
        });

        $('#schedule-switch').change(function () {
            $('.campaign-schedule').toggle();
        });
    </script>
@endif

<!-- Custom Js -->
@if(Request::is('dashboard'))
    <script src="{{ asset('assets/js/custom-scripts-dashboard.js') }}"></script>
@else
    <script src="{{ asset('assets/js/custom-scripts.js') }}"></script>
@endif
</body>
</html>
