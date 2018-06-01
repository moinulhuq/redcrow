<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../fontawesome/web-fonts-with-css/css/fontawesome-all.css">
    <title>@yield('title')</title>

<style>
    /* Body */
    body {
        padding-top: 130px;
    }

    /* Footer */
    footer{
        background-color: #424558;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 35px;
        text-align: center;
        color: #CCC;
    }

    footer p {
        padding: 10.5px;
        margin: 0px;
        line-height: 100%;
    }

    footer p a{
        color:#0a93a6;
        text-decoration:none;
    }

    /* Carousel */
    .carousel {
        margin-bottom: 4rem;
    }
    .carousel-caption {
        z-index: 10;
        bottom: 3rem;
    }
    .carousel-item {
        height: 20rem;
        background-color: #777;
    }
    .carousel-item > img {
        position: absolute;
        top: 0;
        left: 0;
        min-width: 100%;
        height: 32rem;
    }

    /* Form */
    .custom-select.is-invalid,
    .form-control.is-invalid,
    .was-validated .custom-select:invalid,
    .was-validated .form-control:invalid {
        border-color: #424242;
    }
</style>

</head>
    <body>
        <div class="container">
            @yield('navbar')
        </div>
        <div class="container">
            @yield('header')
        </div>
        <div class="container">
            @yield('content')
        </div>
        <div class="container">
            @yield('footer')
        </div>
    </body>
</html>