<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', env('APP_NAME'))</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    @yield('css')
    @if(App::getLocale() == 'ar')
        <style>
            body {
                direction: rtl;
                text-align: right;
            }

            .sidebar {
                padding: 0;
            }

            .sidebar .nav-item .nav-link {
                text-align: right;
            }

            .sidebar .nav-item .nav-link[data-toggle=collapse]::after {
                float: left;
                transform: rotate(180deg);
            }

            .ml-auto,
            .mx-auto {
                margin-left: unset !important;
                margin-right: auto !important;
            }

            .topbar .dropdown .dropdown-menu {
                right: -120%;

            }

            .img-profile {
                object-fit: cover;
            }
        </style>
    @endif
</head>