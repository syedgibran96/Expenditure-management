<?php
  $con =mysqli_connect("localhost","root","","expenseoo");

                    if(!$con)
                    {
                    echo "not connected to database";
                     }

                     //connectd to database
                     $updateid= $_REQUEST['id'];
                     $category =$_GET['category'];
                     $cost= $_GET['cost'];
                     $date= $_GET['date'];
                     $query= "call updatem('".$category."','".$cost."','".$date."','".$updateid."');"; 
                     $result= mysqli_query($con,$query);

                     if($result===TRUE)
                     {
                     	echo "updated";
                     	header("location:tablem.php");
                     }
                     

 
  ?>
