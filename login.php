<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expenseoo";
$er=" ";
if(isset($_POST['submit'])){
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else
{
$email=$_POST['email'];
$password=$_POST['password'];

//$sql="select * from users where email='$email' AND password='$password'";
$sql="call login('".$email."','".$password."');";
$reuslt = mysqli_query($conn,$sql);


$num =mysqli_fetch_array($reuslt);

if($num>0)
{    session_start();
	 $_SESSION['email'] = $email;
	 header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/home1.php");
	}
	else
	{   
		$er="Invalid Username or password";
	}
}
}
echo <<<LOGIN
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/css/styles.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alex+Brush">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Armata">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bungee+Shade">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
    <link rel="stylesheet" href="assets/css/Block-Responsive-Item-List.css">
    <link rel="stylesheet" href="assets/css/Carousel-Hero.css">
    <link rel="stylesheet" href="assets/css/Features-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/News-Cards.css">
    <link rel="stylesheet" href="assets/css/Responsive-footer.css">
    <link rel="stylesheet" href="assets/css/Responsive-footer.css">
    <link rel="stylesheet" href="assets/css/sss-Product-List-f.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="height:600px;">
    <div>
        <nav class="navbar navbar-light navbar-expand fixed-top navigation-clean-button" style="margin-top:0px;padding-top:20px;padding-bottom:19px;">
            <div class="container-fluid"><a class="navbar-brand bounce animated" href="home.html" style="font-family:'Bungee Shade', cursive;font-size:31px;color:#c6930a;margin-top:-7px;">Expensoo!</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        
                        <li class="nav-item" role="presentation"><a class="nav-link" href="home.html" data-bs-hover-animate="pulse" style="padding-left:20px;padding-right:20px;"><strong>Home</strong></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#" data-bs-hover-animate="pulse"><strong>About Us</strong></a></li>
						<li class="nav-item" role="presentation"><a class="nav-link" href="contactus.html" data-bs-hover-animate="pulse"><strong>Contact Us</strong></a></li>
                    </ul><span class="navbar-text actions"> <a class="btn btn-light action-button mr-2" role="button" href="signup.html" data-bs-hover-animate="pulse">Sign Up</a></span></div>
    </div>
    </nav>
    </div>
    <div class="container-fluid" style="padding:0px;padding-bottom:0px;padding-top:0px;height:600px;">
        <div class="row mh-100vh">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block" style="height:px;">
                <div class="m-auto w-lg-75 w-xl-50">
                    <h2 class="text-info font-weight-light mb-5" style="font-family:Aclonica, sans-serif;color:#17a2b8;">&nbsp;EXPENSOO!</h2>
                    <form action="login.php" method="post"> <p style="color: red">$er</p>
                        <div class="form-group"><label class="text-secondary">Email</label><input class="form-control" name="email" type="text" required="" placeholder="example@ex.com"></div>
                        <div class="form-group"><label class="text-secondary">Password</label><input class="form-control" type="password" name="password" required=""></div><input type="submit" class="btn btn-info mt-2" name="submit"></form>
                    <p class="mt-3 mb-0"></p>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image:url(&quot;assets/img/computer-receipt-vector-illustration-cartoon-big-bill-tax-paper-invoice-desktop-pc-concept-financial-flat-accounting-111511647.jpg&quot;);background-size:cover;background-position:center center;height:654px;">
                <p class="ml-auto small text-dark mb-2"><a href="https://unsplash.com/photos/v0zVmWULYTg?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText" target="_blank" class="text-dark"><em>Aldain Austria</em></a><br></p>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
	<script>
  function preventBack() {
    window.history.forward();
  }
  setTimeout("preventBack()", 0);
  
  window.onunload = function() {
  window.alert("need to logout");
   
  };
</script>
</body>
</html> 
LOGIN;
?>