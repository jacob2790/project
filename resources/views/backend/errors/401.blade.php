@extends('backend.layouts.errors')

@section('content')
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v1"
             style="background-image: url({{ URL::asset('resources/assets/backend/media/error/bg1.jpg') }});">
            <div class="kt-error-v1__container">
                <h1 class="kt-error-v1__number">401</h1>
                <p class="kt-error-v1__desc">
                    Oops! Unauthorized access.
                    <br>
                    You're not allowed to access this location.
                    <br><br>
                    <a href="{{ url(\Config::get('app.app_route_prefix') . '/dashboard') }}" class="kt-home-button">
                        Return home </a>
                </p>
            </div>
        </div>
    </div>
@endsection
