<!doctype html>
<html x-data="data()">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | Emin</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="{{ asset('/img/crm.png') }}">

  <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
  <script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/js/formatter.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/js/init-alpine.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/js/focus-trap.js') }}"></script>
  @yield('content')
  </body>
  <script type="text/javascript">
    // set active page style in sidebar menu
    currentPageMenu();
  </script>
</html>