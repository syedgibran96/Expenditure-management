<?php
 unset($_SESSION['status']);  
      session_destroy();
header("Location: home.html");	  
?>