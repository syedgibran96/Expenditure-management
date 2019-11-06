<?php
  $con =mysqli_connect("localhost","root","","expenseoo");

                    if(!$con)
                    {
                    echo "not connected to database";
                     }

                     //connectd to database
                     $deleteid= $_REQUEST['id'];
                     $query= "call delete_f('".$deleteid."');"; 
                     $result= mysqli_query($con,$query);

                     if($result===TRUE)
                     {
                     	echo "deleted";
                     	header("location:tablef.php");
                     }
                     
                     ?>
