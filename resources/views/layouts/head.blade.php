<head>
    <meta charset="UTF-8">
    <title> STIDCE - @yield('htmlheader_title', 'STIDCE') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description"
          content="desenvolvimento de software web em fortaleza, empresa de ti em fortaleza, criação de aplicativos moveis para iphone , android e windows phone">
    <meta name="author" content="include tecnologia">
    <meta property="fb:app_id" content="1750056508552444"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ URL::current()}}"/>
    <meta property="og:title" content=" Alan Victor Galvão"/>
    <meta property="og:image" , content="{{ asset('global/img/sitecover.jpg') }}"/>
    <meta property="og:description"
          content="desenvolvimento de software web em fortaleza, empresa de ti em fortaleza, criação de aplicativos moveis para iphone , android e windows phone"/>

    <link rel="shortcut icon" href="{{ asset('global/img/favicon.png') }}" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="{{ asset('global/img/apple-touch-icon.png') }}"/>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('global/img/apple-touch-icon-57x57.png') }}"/>
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('global/img/apple-touch-icon-72x72.png') }}"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('global/img/apple-touch-icon-76x76.png') }}"/>
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('global/img/apple-touch-icon-114x114.png') }}"/>
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('global/img/apple-touch-icon-120x120.png') }}"/>
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('global/img/apple-touch-icon-144x144.png') }}"/>
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('global/img/apple-touch-icon-152x152.png') }}"/>

    @auth
        <link href="{{ asset('/css/app-admin.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/plugins/sweetalert2/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

        <link rel="stylesheet" type="text/css"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    @endauth

    @guest
        <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css"/>

    @endguest


</head>
