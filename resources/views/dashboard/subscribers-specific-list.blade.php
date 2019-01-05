@extends('dashboard.layouts.dashboard-layout')

@section('page')
    <div id="page-wrapper">
        <div class="header">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h1 class="page-header">
                        List "{{ $list->name }}"
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ url('dashboard/subscribers') }}">Subscribers</a></li>
                        <li class="active">List {{ $list->id }}</li>
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
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-action">
                            <b>List info</b>
                        </div>
                        <div class="card-image">
                            <div class="collection">
                                <div class="collection-item"><b>List id: </b>{{ $list->id }}</div>
                                <div class="collection-item"><b>List name: </b>{{ $list->name }}</div>
                                <div class="collection-item"><b>Description: </b>{{ $list->description }}</div>
                                <div class="collection-item"><b>Subscribers: </b>{{ $number_of_subscribers }}</div>
                                <div class="collection-item"><b>Status: </b>
                                    @if ($list->verified)
                                        Verified
                                    @else
                                        Unverified
                                    @endif
                                </div>
                                <div class="collection-item"><b>Created at: </b>{{ $list->created_at }}</div>
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
                                <table class="table table-striped table-hover" id="dataTable-simple">
                                    <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Company</th>
                                        <th>Created at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($subscribers as $subscriber)
                                        <tr>
                                            <td>{{ $subscriber->email }}</td>
                                            <td>{{ $subscriber->first_name }}</td>
                                            <td>{{ $subscriber->last_name }}</td>
                                            <td>{{ $subscriber->company }}</td>
                                            <td>{{ $subscriber->created_at }}</td>
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
