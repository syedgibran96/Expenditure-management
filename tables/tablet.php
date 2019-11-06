<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Total table header</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

      <link rel="stylesheet" type="text/css" href="nav.css">
      <link rel="stylesheet" href="css/style.css">

  
</head>

<style type="text/css">
  a{
    color: white;
  }
</style>

<body>

  <div id="sidebar" class="visible">
  <ul>
    <li><a href="../home1.php">Menu</a></li>
	<li><a href="chartst/totalb.php">Bar</a></li>
    <li><a href="chartst/totalp.php">Pie</a></li>
    <li><a href="chartst/totald.php">Donut</a></li>
    </ul>

  <div id="sidebar-btn">
    <span></span>
    <span></span>
    <span></span>  
  </div>
</div>

<script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#sidebar-btn').click(function(){
      $('#sidebar').toggleClass('visible');
    });
  });
</script>
  <section>
  <!--for demo wrap-->
  <h1>TOTAL TABLE</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Category</th>
          <th>Cost</th>
          <th>Date</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>

        

                <?php
                $conn=mysqli_connect("localhost","root","","expenseoo");

if($conn)
{
    //print("connteced");
}

else
{
    echo "not connected";
}
session_start();
$email1=$_SESSION['email'];
$res="select * from food where email='$email1'";
$res1="select * from ent where email='$email1'";
$res2="select * from medic where email='$email1'";
$res3="select * from misc where email='$email1'";
$result= mysqli_query($conn,$res);


                while($row=mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>".$row['category']."</td>";
                    echo "<td>".$row['cost']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "</tr>";
                }
$result= mysqli_query($conn,$res1);


                while($row=mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>".$row['category']."</td>";
                    echo "<td>".$row['cost']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "</tr>";
                }
$result= mysqli_query($conn,$res2);


                while($row=mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>".$row['category']."</td>";
                    echo "<td>".$row['cost']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "</tr>";
                }
$result= mysqli_query($conn,$res3);


                while($row=mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>".$row['category']."</td>";
                    echo "<td>".$row['cost']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "</tr>";
                }
                ?>
      </tbody>
    </table>
  </div>
</section>


<!-- follow me template -->

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="javas/index.js"></script>




</body>

</html>
