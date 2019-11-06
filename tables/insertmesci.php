<?php
                $conn=mysqli_connect("localhost","root","","expenseoo");

if($conn)
{
	session_start();
    $cat=$_POST['category'];
	$date=$_POST['date'];
	$amount=$_POST['amount'];
	$email=$_SESSION['email'];
	

$sql="call insertmisc('".$email."','".$cat."','".$amount."','".$date."');";
$result=mysqli_query($conn,$sql); 
	echo "<SCRIPT type='text/javascript'> 
        window.location.replace(\"http:tablemesci.php\");
    </SCRIPT>";


}

else
{
    echo "not connected";
}
?>