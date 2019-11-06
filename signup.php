<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expenseoo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $file = $_FILES['avatar-file'];
	$fileName = $_FILES['avatar-file']['name'];
	$fileTmpName = $_FILES['avatar-file']['tmp_name'];
	$fileSize = $_FILES['avatar-file']['size'];
	$fileError = $_FILES['avatar-file']['error'];
	$fileType = $_FILES['avatar-file']['type'];
	
	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	$fileNameNew = uniqid('',true).".".$fileActualExt;
				$fileDestination = 'pimages/'.$fileNameNew;
				move_uploaded_file($fileTmpName,$fileDestination);	
			
$name = $_POST['name'];
$phno = $_POST['phno'];
$salary = $_POST['salary'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender= $_POST['gender'];
$picn=$fileNameNew;





$sql = "call signup('".$name."','".$phno."','".$email."','".$salary."','".$password."','".$picn."','".$gender."');";

if (mysqli_query($conn, $sql)) {
    $message = 'Submitted sucessfully.';

   echo "<SCRIPT type='text/javascript'> 
        window.location.replace(\"http:login.php\");
    </SCRIPT>";


}
 else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn); 

?>