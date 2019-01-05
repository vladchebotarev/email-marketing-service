@extends('dashboard.layouts.dashboard-layout')

@section('page')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Templates
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="active">Templates</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                @foreach($templates as $template)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{ asset('img/templates/' . $template->image_url) }}">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">{{ $template->name }}<i
                                        class="material-icons right">more_vert</i></span>
                                <p><a href="{{ url('dashboard/templates/preview/' . $template->id) }}" target="_blank">Preview</a></p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">{{ $template->name }}<i
                                        class="material-icons right">close</i></span>
                                <p>{{ $template->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
@endsection
