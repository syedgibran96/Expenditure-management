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

//for rent sum
$query = "SELECT SUM(cost) FROM misc WHERE email = '$a' AND category='rent'";
$ren = mysqli_fetch_row(mysqli_query($conn, $query));

//for water sum
$query = "SELECT SUM(cost) FROM misc WHERE email='$a' AND category='water'";
$wat = mysqli_fetch_row(mysqli_query($conn, $query));

//for electricity sum
$query = "SELECT SUM(cost) FROM misc WHERE email='$a' AND category='electricity'";
$ele = mysqli_fetch_row(mysqli_query($conn, $query));

//for loan sum
$query = "SELECT SUM(cost) FROM misc WHERE email='$a' AND category='loan'";
$loa= mysqli_fetch_row(mysqli_query($conn, $query));

//for maintainance sum
$query = "SELECT SUM(cost) FROM misc WHERE email='$a' AND category='maintainance'";
$mai = mysqli_fetch_row(mysqli_query($conn, $query));

//for miscellaneous sum
$query = "SELECT SUM(cost) FROM misc WHERE email='$a' AND category='miscellaneous'";
$mis = mysqli_fetch_row(mysqli_query($conn, $query));





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
           
           ['Rent', parseInt('<?php echo $ren[0]; ?>')],
          ['Water',       parseInt('<?php echo $wat[0]; ?>')],
          ['Electricity', parseInt('<?php echo $ele[0]; ?>')],
          ['Loan', parseInt('<?php echo $loa[0]; ?>')],
          ['Maintainance', parseInt('<?php echo $mai[0]; ?>')],
          ['Miscellaneous', parseInt('<?php echo $mis[0]; ?>')]
        ]);

        var options = {
          title: 'Miscellaneous Expenses'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <a href="../tablemesci.php"><input type="button" value="Back"></a>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>