@extends('dashboard.layouts.dashboard-layout')

@section('page')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li class="active">Data</li>
            </ol>

        </div>
        <div id="page-inner">
            <div class="dashboard-cards">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

                        <div class="card horizontal cardIcon waves-effect waves-dark">
                            <div class="card-image red">
                                <i class="material-icons dp48">work</i>
                            </div>
                            <div class="card-stacked red">
                                <div class="card-content">
                                    <h3>{{ number_format($campaigns) }}</h3>
                                </div>
                                <div class="card-action">
                                    <strong>CAMPAIGNS</strong>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

                        <div class="card horizontal cardIcon waves-effect waves-dark">
                            <div class="card-image orange">
                                <i class="material-icons dp48">email</i>
                            </div>
                            <div class="card-stacked orange">
                                <div class="card-content">
                                    <h3>{{ number_format($emails) }}</h3>
                                </div>
                                <div class="card-action">
                                    <strong>EMAILS</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

                        <div class="card horizontal cardIcon waves-effect waves-dark">
                            <div class="card-image blue">
                                <i class="material-icons dp48">open_in_browser</i>
                            </div>
                            <div class="card-stacked blue">
                                <div class="card-content">
                                    <h3>{{ number_format($opens) }} ({{ $open_rate }}%)</h3>
                                </div>
                                <div class="card-action">
                                    <strong>OPENS</strong>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

                        <div class="card horizontal cardIcon waves-effect waves-dark">
                            <div class="card-image green">
                                <i class="material-icons dp48">track_changes</i>
                            </div>
                            <div class="card-stacked green">
                                <div class="card-content">
                                    <h3>{{ number_format($clicks) }} ({{ $ctr }}%)</h3>
                                </div>
                                <div class="card-action">
                                    <strong>CLICKS</strong>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <input type="hidden" id="sent-open-bar-chart" value="{{ $sent_open_bar_chart }}">
            <input type="hidden" id="open-click-line-chart" value="{{ $open_click_line_chart }}">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                    <div class="card">
                        <div class="card-action">
                            <b>Opens Clicks Line Chart</b>
                        </div>
                        <div class="card-image">
                            <div id="morris-line-chart"></div>
                        </div>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                    <div class="card">
                        <div class="card-action">
                            <b>Emails Opens Bar Char</b>
                        </div>
                        <div class="card-image">
                            <div id="morris-bar-chart"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
@endsection
