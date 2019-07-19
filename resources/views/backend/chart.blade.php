@extends('layouts.app')

@section('content')
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lsapp";
$con = mysqli_connect($servername, $username, $password, $dbname);
?>
<script type="text/javascript">
  google.load("visualization", "1", {
    packages: ["corechart"]
  });
  google.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([

      ['User', 'Post'],
      <?php
      $query = "SELECT COUNT(posts.id) as Post, users.name as Person FROM posts JOIN users WHERE posts.user_id = users.id GROUP BY posts.user_id";

      $exec = mysqli_query($con, $query);
      while ($row = mysqli_fetch_array($exec)) {
        echo "['" . $row['Person'] . "'," . $row['Post'] . "],";
      }
      ?>

    ]);

    var options = {
      title: 'Number of Posts according to their User',
      pieHole: 0.5,
      pieSliceTextStyle: {
        color: 'black',
      },
      legend: 'none'
    };
    var chart = new google.visualization.PieChart(document.getElementById("postsByUserPie"));
    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.load("visualization", "1", {
    packages: ["corechart"]
  });
  google.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([

      ['Day', 'Post'],
      <?php
      $query = "SELECT COUNT(id) AS Post, date_format(created_at, '%d/%m') AS DayPost FROM `posts` GROUP BY date_format(created_at, '%d/%m') ORDER BY date_format(created_at, '%d/%m')";

      $exec = mysqli_query($con, $query);
      while ($row = mysqli_fetch_array($exec)) {
        echo "['" . $row['DayPost'] . "'," . $row['Post'] . "],";
      }
      ?>

    ]);

    var options = {
      title: 'Number of Posts according to their Created Date',
      legend: 'none'
    };
    var chart = new google.visualization.LineChart(document.getElementById("postsByDayLine"));
    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.load("visualization", "1", {
    packages: ["corechart"]
  });
  google.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Day');
    data.addColumn('number', 'User 1-giang');
    data.addColumn('number', 'User 2-test');
    data.addRows([

      <?php
      $query = "SELECT date_format(created_at, '%d/%m') as ngay, COUNT(id) as nguoi1, 0 as nguoi2 FROM `posts` WHERE user_id=1 GROUP by ngay UNION ALL SELECT date_format(created_at, '%d/%m') as ngay, 0 as nguoi1, COUNT(id) as nguoi2 FROM `posts` WHERE user_id=2 GROUP by ngay Order by ngay";

      $exec = mysqli_query($con, $query);
      while ($row = mysqli_fetch_array($exec)) {
        echo "['" . $row['ngay'] . "'," . $row['nguoi1'] . "," . $row['nguoi2'] . "],";
      }
      ?>

    ]);

    var options = {
      title: 'Number of Posts according to their Created Date and User',
      legend: {
        position: 'bottom'
      }
    };
    var chart = new google.visualization.LineChart(document.getElementById("postsDayUser"));
    chart.draw(data, options);
  }
</script>

</head>

<body>
  <div class="container-fluid">
    <div id="postsByUserPie" style="width: 100%; height: 500px;"></div>
  </div>

  <div class="container-fluid">
    <div id="postsByDayLine" style="width: 100%; height: 500px;"></div>
  </div>

  <!-- <div class="container-fluid">
    <div id="postsDayUser" style="width: 100%; height: 500px;"></div>
  </div> -->

</body>
@endsection