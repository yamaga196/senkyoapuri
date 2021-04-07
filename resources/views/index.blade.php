<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>選挙くん</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

  @include('layouts.app')

  <div class="image-matome">
    @foreach ($candidates as $candidate)
      <div class="image">
        <img src="{{ $candidate->image }}" alt="{{ $candidate->name }}">
        <h3 class="name">{{ $candidate->name }} ({{ $candidate->age }})</h3>
        <h4 class="slogan">「{{ $candidate->slogan }}」</h4>
        <a href="{{ action('IndexController@show', $candidate->id) }}">
          <p class="text">{{ $candidate->text }}</p>
        </a>
      </div>
    @endforeach
  </div>
  
</body>
</html>