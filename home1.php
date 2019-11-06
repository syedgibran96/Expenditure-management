<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expenseoo";
session_start();
$email=$_SESSION['email'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else
{
	$sql="call users_name('".$email."');";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0)
	{
		$row=mysqli_fetch_assoc($result);
		$name=$row["username"];
		$salary=$row["salary"];
		$image=$row["dp"];
		$_SESSION['id']=$row["id"];
	}
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
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
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Contact-FormModal-Contact-Form-with-Google-Map.css">
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
    <link rel="stylesheet" href="assets/css/Team-Boxed.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand navigation-clean-button" style="margin-top:0px;padding-top:20px;padding-bottom:19px;">
        <div class="container-fluid"><a class="navbar-brand bounce animated" href="#" style="font-family:'Bungee Shade', cursive;font-size:31px;color:#c6930a;margin-top:-7px;">Expensoo!</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    
                </ul><span class="navbar-text actions"> </span><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" href="home.html" data-bs-hover-animate="pulse" style="background-color:#f78593;width:126px;">logout</a></span></div>
        </div>
    </nav>
    <section style="height:277px;margin-top:20px;">
        <div class="container" style="padding-top:15px;padding-bottom:15px;height:249px;"><img class="rounded-circle" src="pimages/<?php echo $image; ?>" width="200px" height="200px">
            <div class="row" style="margin-left:217px;height:89px;margin-bottom:7px;margin-top:-192px;margin-right:42px;">
                <div class="col">
                    <h1>Username:<?php echo $name; ?></h1>
                </div>
            </div>
            <div class="row" style="margin-left:217px;height:89px;margin-bottom:7px;margin-top:23px;margin-right:42px;">
                <div class="col">
                    <h1>Salary :<?PHP echo $salary; ?></h1>
                </div>
            </div>
        </div>
    </section>
    <div>
        <div class="container" style="height:357px;margin-top:49px;">
            <div class="row" style="height:100%;">
                <div class="col">
                    <div class="jumbotron" style="margin-bottom:0px;margin-top:36px;background-image:url(&quot;assets/img/rene-bohmer-481562-unsplash.jpg&quot;);background-size:cover;background-position:center;height:322px;">
                        <h1 style="color:rgb(255,255,255);padding-top:28px;font-size:55px;">Total Expenditure</h1>
                        <p></p>
                        <p><a class="btn btn-primary" role="button" href="tables/tablet.php" style="margin-left:6px;">Select</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="height:357px;margin-top:49px;">
            <div class="row">
                <div class="col-md-6" style="height:321px;">
                    <div class="jumbotron" style="background-image:url(&quot;assets/img/brooke-lark-500141-unsplash.jpg&quot;);background-position:center;background-size:cover;margin-top:7px;">
                        <h1 style="color:rgb(252,252,252);">Food</h1>
                        <p style="color:rgb(255,255,255);">Fruits,Vegetables,Meat,Snack,breakfast,lunch,dinner and beverages</p>
                        <p><a class="btn btn-primary" role="button" href="tables/tablef.php">select</a></p>
                    </div>
                </div>
                <div class="col-md-6" style="height:321px;margin:0px;padding-top:7px;">
                    <div class="jumbotron" style="background-image:url(&quot;assets/img/frank-septillion-208829-unsplash.jpg&quot;);background-position:center;background-size:cover;height:302px;margin-top:1px;">
                        <h1 style="color:rgb(255,255,255);">Entertainment</h1>
                        <p style="color:rgb(255,255,255);">Internet ,TV,Music,Subscriptions,Movies,Concerts Newspaper,Events etc.</p>
                        <p><a class="btn btn-primary" role="button" href="tables/tableent.php">select</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container" style="height:388px;">
            <div class="row" style="margin-top:21px;">
                <div class="col-md-6" style="height:330px;">
                    <div class="jumbotron" style="background-image:url(&quot;assets/img/pina-messina-464947-unsplash.jpg&quot;);background-size:cover;height:302px;background-position:center;margin-top:15px;">
                        <h1 style="color:rgb(255,255,255);">Medical</h1>
                        <p style="color:rgb(254,255,255);">Checkups,Surgery,Tablets,Vaccines,Diagnosis</p>
                        <p><a class="btn btn-primary" role="button" href="tables/tablem.php">select</a></p>
                    </div>
                </div>
                <div class="col-md-6" style="height:330px;">
                    <div class="jumbotron" style="background-image:url(&quot;assets/img/neonbrand-605156-unsplash.jpg&quot;);background-size:cover;background-position:center;height:302px;margin-top:15px;">
                        <h1 style="color:rgb(255,255,255);">Miscellanious</h1>
                        <p style="color:rgb(255,255,255);">Rent,Water ,Electricity,Maintainance,Shopping,Service etc</p>
                        <p><a class="btn btn-primary" role="button" href="tables/tablemesci.php">select</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-basic">
        <footer>
            <div class="social"><a href="https://www.instagram.com"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
            <ul
                class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#features">Services</a></li>
                <li class="list-inline-item"><a href="#">About us</a></li>
                <li class="list-inline-item"><a href="#">Contact us</a></li>
                </ul>
                <p class="copyright">Expensoo! © 2018</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="assets/js/Contact-FormModal-Contact-Form-with-Google-Map.js"></script>
</body>
<script>
  function preventBack() {
    window.history.forward();
  }
  setTimeout("preventBack()", 0);
  
  window.onunload = function() {
  window.alert("need to logout");
   
  };
</script>
</html>