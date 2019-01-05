@extends('dashboard.layouts.dashboard-layout')

@section('page')
    <div id="page-wrapper">
        <div class="header">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h1 class="page-header">
                        Campaigns
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li class="active">Campaigns</li>
                    </ol>
                </div>
                @if ($errors->any())
                    <div class="col-lg-6 col-md-6">
                        <div class="page-alert">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <strong>Error!</strong>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if (session('success'))
                    <div class="col-lg-6 col-md-6">
                        <div class="page-alert">
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <strong>Success!</strong> {{ session('success') }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-action">
                            Campaigns
                            <a class="btn create-button-right" href="{{ url('dashboard/campaigns/send-campaign') }}">Send new
                                campaign <i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="dataTable-campaigns">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Info</th>
                                        <th>Status</th>
                                        <th>Statistics</th>
                                        <th>Creation date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($campaigns as $campaign)
                                        <tr>
                                            <td>{{ $campaign->id }}</td>
                                            <td>
                                                <b>From name: </b>{{ $campaign->from_name }}<br>
                                                <b>From email: </b>{{ $campaign->from_email }}<br>
                                                <b>Subject: </b>{{ $campaign->subject }}<br>
                                                <b>Template: </b>{{ $campaign->template }}<br>
                                                <b>List of subscribers: </b>{{ $campaign->subscribers_list }} ({{ $campaign->subscribers }})
                                            </td>
                                            <td>
                                                <b>{{ $campaign->status }}</b><br>
                                                @if($campaign->status === 'Scheduled')
                                                    at {{ $campaign->schedule_date }}
                                                @endif
                                                @if($campaign->status === 'Complete')
                                                    at {{ $campaign->updated_at }}
                                                @endif
                                            </td>
                                            <td class="col-md-1">
                                                @if($campaign->status === 'Complete')
                                                    <b>Emails sent: </b>{{ $campaign->emails }}<br>
                                                    <b>Opens: </b>{{ $campaign->opens }}<br>
                                                    <b>Clicks: </b>{{ $campaign->clicks }}<br>
                                                @else
                                                    Not available
                                                @endif

                                            </td>
                                            <td>{{ $campaign->created_at }}</td>
                                            <td class="center"><a href="{{ url('dashboard/campaigns/specific/' . $campaign->id) }}" class="tooltipped" data-position="left"
                                                                  data-tooltip="Details"><i class="fa fa-search fa-lg"
                                                                                            aria-hidden="true"></i></a>
                                            </td>
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
