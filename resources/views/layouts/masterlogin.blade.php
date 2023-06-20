<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- لجعل الموقع يدعم اصدارات انترنت اكس بلورل --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="{{ asset('/js/admin/jquery.min.js') }}" defer></script>
    <script src="{{ asset('/js/admin/bootstrap.bundle.min.js') }}" defer></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>تسجيل الدخول</title>
    <link href="{{ asset('/css/admin/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin/style_admin_login.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="/images/logo.PNG">
</head>

<body>
    {{-- content المحتوى --}}
    @yield('content')
    {{-- content end --}}

</body>

</html>
