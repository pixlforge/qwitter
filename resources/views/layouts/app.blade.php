<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  {{-- CSRF Token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>{{ config('app.name', 'Laravel') }}</title>

  {{-- Styles --}}
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  
  {{-- Scripts --}}
  <script src="{{ mix('js/app.js') }}" defer></script>
  <script>
    window.User = {
      id: "{{ optional(auth()->user())->id }}",
      avatar_url: "{{ optional(auth()->user())->getAvatarUrl() }}"
    }
  </script>
</head>
<body>
  <div id="app">
    <div class="container mx-auto">
      @yield('content')
    </div>
  </div>
</body>
</html>
