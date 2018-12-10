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
                                <form method="POST" enctype="multipart/form-data"
                                      action="{{ route('campaigns.send') }}"
                                      class="col s6">
                                    @csrf
                                    <div class="input-field col s12">
                                        <select name="subscribers_list" required>
                                            <option value="" disabled selected>Choose list of subscribers</option>
                                            @foreach ($subscribers_lists as $list)
                                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                            @endforeach
                                        </select>
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
