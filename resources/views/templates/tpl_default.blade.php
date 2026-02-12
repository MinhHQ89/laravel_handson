<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page Title</title>
    <link rel="stylesheet" href="path_to_css_file" media="all">
    @yield('css')
</head>
<body>
@include('includes.header')
    <h2>Title from {{$name}} template</h2>
    @yield('content')
    <script src="path_to_js"></script>
    @yield('js')
@include('includes.footer')
</body>
</html>