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
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
         ['Order', 'amount'],
          ['Grocery', parseInt('<?php echo $sum[0]; ?>')],
          ['Breakfast',       parseInt('<?php echo $bf[0]; ?>')],
          ['Lunch', parseInt('<?php echo $l[0]; ?>')],
          ['Snacks', parseInt('<?php echo $eats[0]; ?>')],
          ['Dinner', parseInt('<?php echo $din[0]; ?>')]
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'FOOD EXPENSE',
            subtitle: 'Amount by percentage' },
          axes: {
            x: {
              0: { side: 'top',label: 'Expense'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
  </head>
  <body>
    <a href="../tablef.php"><input type="button" value="Back"></a>
    <div id="top_x_div" style="width:800px; height: 600px;"></div>
  </body>
</html>
