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
  <!-- Scripts -->
  <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>

  @include('layouts.app')

  @if ($candidate->id)
    <form method="post" action="{{ route('store') }}">
    @csrf
      <div class="detail-image">
        <input type="hidden" value="{{ $candidate->id }}" name="candidate_id">
        <img src="{{ asset($candidate->image) }}" alt="{{ $candidate->name }}">
        <h3 class="name"><a href="{{ $candidate->twitter_link }}">twitter</a> {{ $candidate->name }} ({{ $candidate->age }})</h3>
        <h4 class="slogan">「{{ $candidate->slogan }}」</h4>
        <p class="text">{{ $candidate->text }}</p>
        <div class="detail-submit">
        <div id="chart" style="height: 500px; width: 800px;"></div>
          {{ Form::label('text', '※投票は取り消せません。')}}
          {{ Form::submit('投票', ['class' => 'submit']) }}
        </div>
      </div>
    </form>
  @endif

  <script>
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart(){
      var data = google.visualization.arrayToDataTable([
        ['candidate_id', 'user_id'],
          @php
            foreach($results as $result){
              echo "['".$result->candidate_id."', ".$result->user_id."],";
            }
          @endphp
      ]);

      var options ={
        title: '途中結果',
        is3D: true,
      };

      var chart = new google.visualization.PieChart(document.getElementById('chart'));

      chart.draw(data, options);
    }
  </script>

</body>
</html>