@extends('dashboard.layouts.dashboard-layout')

@section('page')
    <div id="page-wrapper">
        <div class="header">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h1 class="page-header">
                        My Profile
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li class="active">Profile</li>
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
                @if (session('status'))
                    <div class="col-lg-6 col-md-6">
                        <div class="page-alert">
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <strong>Success!</strong> {{ session('status') }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div id="page-inner">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-action">
                            Profile Data
                        </div>
                        <div class="card-content">
                            <div class="col s12">
                                <div class="input-field">
                                    <input id="name" type="text" disabled value="{{ Auth::user()->name }} ">
                                    <label for="email" class="active">Name</label>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="input-field">
                                    <input id="email" type="email" disabled value="{{ Auth::user()->email }} ">
                                    <label for="email" class="active">Email</label>
                                </div>
                            </div>
                            <div class="col s12">
                                <br>
                                <span>Account type: </span><b>Administrator</b>
                                <br><br>
                            </div>
                            <div class="clearBoth"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-action">
                            Change password
                        </div>
                        <div class="card-content">
                            <form method="POST" id="formPass" action="{{ route('profile.password') }}" class="col s12">
                                @csrf
                                <div class="input-field col s12">
                                    <input id="current-password" type="password"
                                           class="validate{{ $errors->has('current_password') ? ' invalid' : '' }}"
                                           name="current_password" required>
                                    <label for="current-password">Current password</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="new-password" type="password"
                                           class="validate{{ $errors->has('password') ? ' invalid' : '' }}"
                                           name="password" required>
                                    <label for="new-password">New password</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="confirm-new-password" type="password"
                                           class="validate{{ $errors->has('password_confirmation') ? ' invalid' : '' }}"
                                           name="password_confirmation" required>
                                    <label for="confirm-new-password">Confirm new password</label>
                                </div>
                                <div class="col">
                                    <br>
                                    <button class="btn" type="submit" name="action">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </form>
                            <div class="clearBoth"></div>
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
