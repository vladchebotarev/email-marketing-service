@extends('dashboard.layouts.dashboard-layout')

@section('page')
    <div id="page-wrapper">
        <div class="header">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h1 class="page-header">
                        Campaign {{ $campaign->id }}
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ url('dashboard/campaigns') }}">Campaigns</a></li>
                        <li class="active">Campaign {{ $campaign->id }}</li>
                    </ol>
                </div>
                @if ($errors->any() or session('SaveError'))
                    <div class="col-lg-6 col-md-6">
                        <div class="page-alert">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <strong>Error!</strong>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                                @if (session('SaveError'))
                                    <p>{{ session('SaveError') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div id="page-inner">

            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-action">
                            <b>Campaign info</b>
                        </div>
                        <div class="card-image">
                            <div class="collection">
                                <div class="collection-item"><b>From name: </b>{{ $campaign->from_name }}</div>
                                <div class="collection-item"><b>From email: </b>{{ $campaign->from_email }}</div>
                                <div class="collection-item"><b>Subject: </b>{{ $campaign->subject }}</div>
                                <div class="collection-item"><b>Template: </b><a
                                        href="{{ url('dashboard/templates/preview/' . $campaign->template_id) }}"
                                        target="_blank">{{ $campaign->template }}</a>
                                </div>
                                <div class="collection-item"><b>List of
                                        subscribers: </b><a
                                        href="{{ url('dashboard/subscribers/list/' . $campaign->subscribers_list_id) }}"
                                        target="_blank">{{ $campaign->subscribers_list }}
                                        ({{ $campaign->subscribers }})</a>
                                </div>
                                <div class="collection-item"><b>Status: </b>{{ $campaign->status }}
                                    @if($campaign->status === 'Scheduled')
                                        at {{ $campaign->schedule_date }}
                                        <br>
                                        <br>
                                        <form method="post" action="{{ route('campaigns.remove') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                                        </form>
                                    @endif
                                    @if($campaign->status === 'Complete')
                                        at {{ $campaign->updated_at }}
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-action">
                            <b>Campaign statistics</b>
                        </div>
                        <div class="card-image">
                            <ul class="collection">
                                <li class="collection-item avatar">
                                    <i class="material-icons circle">email</i>
                                    <span class="title">Emails</span>
                                    <p>Successfully sent: {{ $campaign->emails }}</p>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="material-icons circle blue">open_in_browser</i>
                                    <span class="title">Opens</span>
                                    <p>{{ $campaign->opens }}</p>
                                    <p>Open rate: {{ $open_rate }}%</p>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="material-icons circle green">track_changes</i>
                                    <span class="title">Clicks</span>
                                    <p>{{ $campaign->clicks }}</p>
                                    <p>CTR: {{ $ctr }}%</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-action">
                            <b>Click URL Report</b>
                        </div>
                        <div class="card-image">
                            <div class="collection">
                                @foreach ($clicks as $click)
                                    <a href="{{ $click->url }}" target="_blank"
                                       class="collection-item">{{ $click->url }}<span class="new badge"
                                                                                      data-badge-caption="clicks">{{ $click->clicks }}</span></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-action">
                            Emails
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="dataTable-campaigns">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Recipient</th>
                                        <th>Opens</th>
                                        <th>Clicks</th>
                                        <th>Sent At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($emails as $email)
                                        <tr>
                                            <td>{{ $email->id }}</td>
                                            <td>{{ $email->recipient }}</td>
                                            <td>{{ $email->opens }}</td>
                                            <td>{{ $email->clicks }}</td>
                                            <td>{{ $email->created_at }}</td>
                                            <td class="center">
                                                @if ($email->clicks > 0)
                                                    <a href="{{ url('dashboard/campaigns/url-report/' . $email->id) }}"
                                                       class="tooltipped" data-position="left"
                                                       data-tooltip="URL Report">
                                                        <i class="fa fa-search fa-lg" aria-hidden="true"></i>
                                                    </a>
                                                @endif
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
