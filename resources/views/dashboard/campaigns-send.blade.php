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
                        <li><a href="{{ url('dashboard/campaigns') }}">Campaigns</a></li>
                        <li class="active">Send new campaign</li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-action">
                            Send new campaign
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <form method="POST"
                                      action="{{ route('campaigns.send') }}"
                                      class="col s12 m12 l6">
                                    @csrf
                                    <div class="input-field col s12">
                                        <input type="text" id="subject-autocomplete-input" class="subject-autocomplete"
                                               name="subject" maxlength="150" required>
                                        <label for="subject-autocomplete-input">Subject</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input type="text" id="from-name-autocomplete" class="from-name-autocomplete"
                                               name="from_name" maxlength="150" required>
                                        <label for="from-name-autocomplete">From name</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <select name="from_email" id="from-email" required>
                                            <option value="" disabled selected>Choose email</option>
                                            @foreach ($emails as $email)
                                                <option value="{{ $email->id }}">{{ $email->email }}</option>
                                            @endforeach
                                        </select>
                                        <label for="from-email">From email</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <select name="template" id="template" required>
                                            <option value="" disabled selected>Choose template</option>
                                            @foreach ($templates as $template)
                                                <option value="{{ $template->id }}">{{ $template->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="template">Email template</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <select name="subscribers_list" id="subscribers-list" required>
                                            <option value="" disabled selected>Choose list of subscribers</option>
                                            @foreach ($subscribers_lists as $list)
                                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="subscribers-list">List of subscriber</label>
                                        <br>
                                        <br>
                                    </div>
                                    <!-- Switch -->
                                    <div class="col s12">
                                        <div class="switch">
                                            <label>
                                                Send now
                                                <input type="checkbox" id="schedule-switch" name="schedule">
                                                <span class="lever"></span>
                                                Schedule
                                            </label>
                                        </div>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="campaign-schedule" hidden>
                                        <div class="input-field col s12">
                                            <input type="text" id="datepicker" class="datepicker" name="schedule_date">
                                            <label for="datepicker">Schedule date</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input type="text" id="timepicker" class="timepicker" name="schedule_time">
                                            <label for="timepicker">Schedule time</label>
                                            <small>Time zone New York (UTC -5:00/-4:00). Campaigns send every hour. If you set send time at 09:15, the campaign will be sent at 10:00.</small>
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <br>
                                        <button class="btn" type="submit">Send campaign
                                        </button>
                                    </div>
                                </form>
                            </div>
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
