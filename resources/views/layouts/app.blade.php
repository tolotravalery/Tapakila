<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tapakila</title>
    <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/mediaqueries.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/font-awesome.css">
    <script type="text/javascript" src="{{ url('/') }}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/bootstrap.min.js"></script>


    @if (Auth::User() && (Auth::User()->profile) && $theme->link != null && $theme->link != 'null')
        <link rel="stylesheet" type="text/css" href="{{ $theme->link }}">
    @endif



</head>
<body>
<div id="app">

    @include('partials.nav')

    <div class="container">

        @include('partials.form-status')

    </div>

    @yield('content')
    @include('partials.footer')

</div>

{{-- Scripts --}}
<script src="{{ mix('/js/app.js') }}"></script>
{!! HTML::script('//maps.googleapis.com/maps/api/js?key='.env("GOOGLEMAPS_API_KEY").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!}

@yield('footer_scripts')

</body>
</html>