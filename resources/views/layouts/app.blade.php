<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'UTS PEMWEB')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @stack('head')
</head>
<body>
  @include('partials.navbar')

  <main>
    @yield('content')
  </main>

  <script src="{{ asset('js/main.js') }}"></script>
  @stack('scripts')
</body>
</html>