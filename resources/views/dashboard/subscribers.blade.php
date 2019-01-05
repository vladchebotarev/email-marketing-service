@extends('dashboard.layouts.dashboard-layout')

@section('page')
    <div id="page-wrapper">
        <div class="header">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h1 class="page-header">
                        Subscribers
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li class="active">Subscribers</li>
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
                            Lists of Subscribers
                            <a class="btn create-button-right" href="{{ url('dashboard/subscribers/create-list') }}">Create
                                list <i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="dataTable-subscribers">
                                    <thead>
                                    <tr>
                                        <th>List name</th>
                                        <th>Description</th>
                                        <th>Subscribers</th>
                                        <th>Creation date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($subscribers_lists as $list)
                                        <tr>
                                            <td>{{ $list->name }}</td>
                                            <td>{{ $list->description }}</td>
                                            <td>{{ $list->subscribers }}</td>
                                            <td>{{ $list->created_at }}</td>
                                            <td class="center"><a
                                                    href="{{ url('dashboard/subscribers/list/' . $list->id) }}"
                                                    class="tooltipped" data-position="left"
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
