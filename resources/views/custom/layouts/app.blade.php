<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>

        body {
            padding-top: 4.5rem;
            padding-bottom: 4.5rem;
        }
    </style>
</head>
<body>
@include('custom.partials.header')

<main role="main">
    <div class="container">
        @yield('content')
    </div>
</main>

@include('custom.partials.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

