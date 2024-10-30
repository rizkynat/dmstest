<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  >
  <meta
    name="csrf-token"
    content="{{ csrf_token() }}"
  >
  <title>@yield('title') | Emin</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="{{ asset('/asset/img/logo_emin.ico') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script
    type="text/javascript"
    src="{{ asset('/js/main.js') }}"
  ></script>
</head>

<body>
  @yield('content')
  </form>
  </div>
</body>

</html>