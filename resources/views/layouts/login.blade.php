<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.head')
<body class="hold-transition login-page">
<div id="app">
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
