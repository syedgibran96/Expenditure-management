<?php

$servername ="localhost";
$username = "root";
$password = "";
$dbname="expenseoo";
session_start();
$a=$_SESSION["email"];



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
$query = "SELECT SUM(cost) FROM ent WHERE email = '$a' AND category='travel'";
$sum = mysqli_fetch_row(mysqli_query($conn, $query));

//for fuel sum
$query = "SELECT SUM(cost) FROM ent WHERE email='$a' AND category='fuel'";
$fuel = mysqli_fetch_row(mysqli_query($conn, $query));

//for ecomm sum
$query = "SELECT SUM(cost) FROM ent WHERE email='$a' AND category='ecomm'";
$eco = mysqli_fetch_row(mysqli_query($conn, $query));

//for internet sum
$query = "SELECT SUM(cost) FROM ent WHERE email='$a' AND category='internet'";
$inter = mysqli_fetch_row(mysqli_query($conn, $query));

//for tv sum
$query = "SELECT SUM(cost) FROM ent WHERE email='$a' AND category='tv'";
$tv = mysqli_fetch_row(mysqli_query($conn, $query));

//for movie sum
$query = "SELECT SUM(cost) FROM ent WHERE email='$a' AND category='movie'";
$mov = mysqli_fetch_row(mysqli_query($conn, $query));






?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Catagory', 'Amount'],
           ['Travel', parseInt('<?php echo $sum[0]; ?>')],
          ['Fuel',       parseInt('<?php echo $fuel[0]; ?>')],
          ['Ecomm', parseInt('<?php echo $eco[0]; ?>')],
          ['Internet', parseInt('<?php echo $inter[0]; ?>')],
          ['TV', parseInt('<?php echo $tv[0]; ?>')],
          ['Movie', parseInt('<?php echo $mov[0]; ?>')]
        ]);

        var options = {
          title: 'Entertainment Expense'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <a href="../tableent.php"><input type="button" value="Back"></a>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>