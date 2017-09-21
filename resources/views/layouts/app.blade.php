<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tapakila</title>
    <link rel="stylesheet" href="{{ url('/') }}/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/css/style.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/css/mediaqueries.css">
    @yield('specificCss')
    <link rel="stylesheet" href="{{ url('/') }}/public/css/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/css/font-awesome.css">
    <link href="{{ url('/') }}/public/css/datepicker.css" rel="stylesheet">
    <link href="{{ url('/') }}/public/css/clockpiker.css" rel="stylesheet">
    <script type="text/javascript" src="{{ url('/') }}/public/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/public/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/public/js/datepicker.js"></script>
    <script src="{{ url('/') }}/public/js/clockpicker.js"></script>
</head>
<body>


@include('partials.nav')

<div class="container">

    @include('partials.form-status')

</div>

@yield('content')
@include('partials.footer')



{{-- Scripts --}}
<script src="{{ mix('/js/app.js') }}"></script>
{!! HTML::script('//maps.googleapis.com/maps/api/js?key='.env("GOOGLEMAPS_API_KEY").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!}

@yield('footer_scripts')

</body>
</html>