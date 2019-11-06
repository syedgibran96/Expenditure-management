<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Fixed table header</title>
  
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
	<li><a href="insertm.html">Insert</a></li>
    <li><a href="chartsm/medb.php">Bar</a></li>
    <li><a href="chartsm/medp.php">Pie</a></li>
    <li><a href="chartsm/medd.php">Donut</a></li>
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
  <h1>MEDICAL TABLE</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Category</th>
          <th>Cost</th>
          <th>Date</th>
          <th>Delete</th>
          <th>update</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>

        <script type="text/javascript">
                          $(document).ready(function () {
      $('.editmanager').click(function () {
          var currentTD = $(this).parents('tr').find('td');
          if ($(this).html() == 'Edit') {   
          var i=1;               
              $.each(currentTD, function () {
                if(i<=3)
                {
                  $(this).prop('contenteditable', true);
                }
                i++;

              });
          } else {
                var i=1,email,password;
              $.each(currentTD, function () {
                  $(this).prop('contenteditable', false)
                  switch(i)
                  {
                    case 1: category=$(this).html();
                            break;
                    case 2: cost= $(this).html();
                            break;
                    case 3: date= $(this).html();
                            break;

                  }
                  i++;
                });
              var id=this.value;
            window.location.href = "updatem.php?id="+id+"&category="+category+"&cost="+cost+"&date="+date;
          }

          $(this).html($(this).html() == 'Edit' ? 'Save' : 'Edit')

      });

  });
                              
                          </script>

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
$res="call user_m('".$email1."');";
$result= mysqli_query($conn,$res);


                while($row=mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>".$row['category']."</td>";
                    echo "<td>".$row['cost']."</td>";
                    echo "<td>".$row['date']."</td>";
                    print("<td><a class='button' href='deletem.php?id=".$row['id']."'>delete</a></td>");
                    print("<td><button class='editmanager' value =".$row['id'].">Edit</button></td>");
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
