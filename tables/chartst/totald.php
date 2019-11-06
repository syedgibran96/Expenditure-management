<?php

$servername ="localhost";
$username = "root";
$password = "";
$dbname="expenseoo";
session_start();
$a=$_SESSION['email'];



$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn){
	echo "";
}
else
{
	echo "no connection";
}

mysqli_select_db($conn,$dbname); 

//for travel sum
$query = "SELECT SUM(cost) FROM food WHERE email = '$a'";
$sum = mysqli_fetch_row(mysqli_query($conn, $query));
//for fuel sum
$query = "SELECT SUM(cost) FROM ent WHERE email='$a'";
$fuel = mysqli_fetch_row(mysqli_query($conn, $query));

//for ecomm sum
$query = "SELECT SUM(cost) FROM medic WHERE email='$a'";
$eco = mysqli_fetch_row(mysqli_query($conn, $query));

//for internet sum
$query = "SELECT SUM(cost) FROM misc WHERE email='$a'";
$inter = mysqli_fetch_row(mysqli_query($conn, $query));



?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
['Order','new'],

          ['FOOD', parseInt('<?php echo $sum[0]; ?>')],
          ['ENTERTAINMENT',       parseInt('<?php echo $fuel[0]; ?>')],
          ['MEICAL', parseInt('<?php echo $eco[0]; ?>')],
          ['MISCELLANIOUS', parseInt('<?php echo $inter[0]; ?>')],
          
          
    ]); 

    var options = {
          title: 'Total Expense',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <a href="../tablet.php"><input type="button" value="Back"></a>
    <div id="donutchart"  style="width: 900px; height: 500px;"></div>
  </body>
</html>
</html>