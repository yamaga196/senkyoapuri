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

  <div id="chart" style="height: 800px; width: 1100px; margin: auto;"></div>

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