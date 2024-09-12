@extends('layouts.main')

@section('content')
<html>

  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Sales'],
        <?php echo $result?>
        ]);

        var options = {
          title: 'Sales Analytics',
          curveType: 'line',
          legend: { position: 'top' },
          hAxis: {
          title: 'Date'
        },
        vAxis: {
          title: 'Sales (INR)'
        }
        };
        

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 1250px; height: 500px"></div>
  </body>
  </table>
</div>

</html>




@endsection

