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
                        <li><a href="{{ url('dashboard/subscribers') }}">Subscribers</a></li>
                        <li class="active">Create list</li>
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
                            Create new list
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <form method="POST" enctype="multipart/form-data"
                                      action="{{ route('subscribers.create_list') }}"
                                      class="col s6">
                                    @csrf
                                    <div class="input-field col s12">
                                        <input id="listName" type="text"
                                               class="validate{{ $errors->has('list_name') ? ' invalid' : '' }}"
                                               name="list_name" maxlength="100" value="{{ old('listName') }}" required>
                                        <label for="listName">Name</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="listDescription" type="text"
                                               class="validate{{ $errors->has('list_description') ? ' invalid' : '' }}"
                                               name="list_description" maxlength="100">
                                        <label for="listDescription">Description (optional)</label>
                                    </div>
                                    <div class="input-field col s12 pr-0">
                                        <div class="file-field">
                                            <div class="btn">
                                                <span>File</span>
                                                <input type="file" name="file_feed" required
                                                       accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                        <small>Import subscribers from .xlsx file. Example feed <a href="{{ asset('downloads/subscribers-feed-example.xlsx') }}">Subscribers
                                                feed example.xlsx</a></small>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                    <!-- Switch -->
                                    <div class="col s12">
                                        <div class="switch">
                                            <label>
                                                Unverified
                                                <input type="checkbox" name="verified">
                                                <span class="lever"></span>
                                                Verified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <br>
                                        <br>
                                        <br>
                                        <button class="btn" type="submit">Create list
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
