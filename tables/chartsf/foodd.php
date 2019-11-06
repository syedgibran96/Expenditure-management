<?php

$servername ="localhost";
$username = "root";
$password = "";
$dbname="expenseoo";
//retreving the user email to dispay his records
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

//for grocery sum
$query = "SELECT SUM(cost) FROM food WHERE email = '$a' AND category='grocery'";
$sum = mysqli_fetch_row(mysqli_query($conn, $query));

//for breakfast sum
$query = "SELECT SUM(cost) FROM food WHERE email='$a' AND category='breakfast'";
$bf = mysqli_fetch_row(mysqli_query($conn, $query));

//for lunch sum
$query = "SELECT SUM(cost) FROM food WHERE email='$a' AND category='lunch'";
$l = mysqli_fetch_row(mysqli_query($conn, $query));

//for snacks sum
$query = "SELECT SUM(cost) FROM food WHERE email='$a' AND category='snacks'";
$eats = mysqli_fetch_row(mysqli_query($conn, $query));

//for dinner sum
$query = "SELECT SUM(cost) FROM food WHERE email='$a' AND category='dinner'";
$din= mysqli_fetch_row(mysqli_query($conn, $query));






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

          ['Grocery', parseInt('<?php echo $sum[0]; ?>')],
          ['Breakfast',       parseInt('<?php echo $bf[0]; ?>')],
          ['Lunch', parseInt('<?php echo $l[0]; ?>')],
          ['Snacks', parseInt('<?php echo $eats[0]; ?>')],
          ['Dinner', parseInt('<?php echo $din[0]; ?>')]
    ]); 

    var options = {
          title: 'Food Expense',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <a href="../tablef.php"><input type="button" value="Back"></a>
    <div id="donutchart"  style="width: 900px; height: 500px;"></div>
  </body>
</html>
</html>