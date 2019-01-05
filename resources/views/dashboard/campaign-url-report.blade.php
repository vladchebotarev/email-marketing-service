@extends('dashboard.layouts.dashboard-layout')

@section('page')
    <div id="page-wrapper">
        <div class="header">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h1 class="page-header">
                        URL Report - Email {{ $email_id }}
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ url('dashboard/campaigns') }}">Campaigns</a></li>
                        <li><a href="{{ url('dashboard/campaigns/specific/' . $campaign_id) }}">Campaign {{ $campaign_id }}</a></li>
                        <li class="active">URL Report {{ $email_id }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-action">
                            Url Clicks Report
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>URL</th>
                                        <th>Clicks</th>
                                        <th>First click at</th>
                                        <th>Last click at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($clicks as $click)
                                        <tr>
                                            <td><a href="{{ $click->url }}" target="_blank">{{ $click->url }}</a></td>
                                            <td>{{ $click->clicks }}</td>
                                            <td>{{ $click->created_at }}</td>
                                            <td>{{ $click->updated_at }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
@endsection
