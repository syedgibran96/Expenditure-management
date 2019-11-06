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

//for medicine sum
$query = "SELECT SUM(cost) FROM medic WHERE email = '$a'  AND category='medicine'";
$med = mysqli_fetch_row(mysqli_query($conn, $query));

//for insurance sum
$query = "SELECT SUM(cost) FROM medic WHERE email='$a' AND category='insurance'";
$insu = mysqli_fetch_row(mysqli_query($conn, $query));

//for hospital sum
$query = "SELECT SUM(cost) FROM medic WHERE email='$a' AND category='hospital'";
$hos = mysqli_fetch_row(mysqli_query($conn, $query));

//for emergency sum
$query = "SELECT SUM(cost) FROM medic WHERE email='$a' AND category='emergency'";
$eme = mysqli_fetch_row(mysqli_query($conn, $query));







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
          ['Medicine', parseInt('<?php echo $med[0]; ?>')],
          ['Insurance',       parseInt('<?php echo $insu[0]; ?>')],
          ['Hospital', parseInt('<?php echo $hos[0]; ?>')],
          ['Emergency', parseInt('<?php echo $eme[0]; ?>')]
          
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'MEDICAL EXPENSES',
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
    <a href="../tablem.php"><input type="button" value="Back"></a>
    <div id="top_x_div" style="width:800px; height: 600px;"></div>
  </body>
</html>
