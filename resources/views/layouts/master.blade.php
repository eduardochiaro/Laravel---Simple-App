<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{ URL::to('src/css/main.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

        @yield('styles')
    </head>
    <body>
	    @include('includes.header')
	    <div class="main">
		   @yield('content')
		   
	    </div>
    </body>
</html>