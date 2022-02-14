@extends('backend.layouts.errors')

@section('content')
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v1"
             style="background-image: url({{ URL::asset('resources/assets/backend/media/error/bg1.jpg') }});">
            <div class="kt-error-v1__container">
                <h1 class="kt-error-v1__text">{{ \Config::get('app.site_title') }}</h1>
                <p class="kt-error-v1__desc">
                    Welcome to {{ \Config::get('app.site_title') }}!
                    <br>
                    We're working hard on something really interesting.
                    <br>
                    Please come back later.
                </p>
            </div>
        </div>
    </div>
@endsection
