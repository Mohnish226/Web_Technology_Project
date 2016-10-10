<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
session_start();
?>
<?php
$curr_ID=$_SESSION['ID'];
$curr_Email=$_SESSION["email"];
$_SESSION['login']=2;
if(isset($_GET['opr']) && isset($_GET['uid']))
{
    $epr=$_GET['opr'];
    $cu=$_GET['uid'];
    if($epr =='dele')
    {
		
	    if($cu!=$curr_ID)
	    {   
        $query=mysql_query("SELECT email,pass FROM admin where aid='$cu'")or die(mysql_error());
        while ($row = mysql_fetch_array($query)) 
        {
            $email = $row['email'];
            $epassword = $row['pass'];
        }  
        $data=mysql_query("INSERT INTO wusers (email,pass) VALUES ('$email','$epassword')");
        if($data)
        {
          $data1=mysql_query("DELETE from admin where aid='$cu'");
          if($data1)
          {
            header("location: https://localhost/adminpage.php");
          }
          else
          {
            echo "Erro:".mysql_error();
          }
        }
        else
        {
          echo "Erro:".mysql_error();
        }
  	  }	
    }
    if($epr =='add')
    {   
        $query=mysql_query("SELECT email,pass FROM wusers where userID='$cu'")or die(mysql_error());
        while ($row = mysql_fetch_array($query)) 
        {
            $email = $row['email'];
            $epassword = $row['pass'];
        }

        $data=mysql_query("INSERT INTO admin (email,pass) VALUES ('$email','$epassword')");
        if($data)
        {
          $data1=mysql_query("DELETE from wusers where userID='$cu'");
          if($data1)
          {
            header("location: https://localhost/adminpage.php");
          }
          else
          {
            echo "Erro:".mysql_error();
          }
        }
        else
        {
          echo "Erro:".mysql_error();
        }
      }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>ADMIN PANEL</title>
  <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/main.css" rel="stylesheet">
    <!-- custom font awesome -->
    <link href="./home/css/font-awesome.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <!-- material design -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap-material-design.css">
  	<link rel="stylesheet" type="text/css" href="./css/ripples.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
</head>
<body>
  <!-- NavBar -->
  <div class="container-fluid">
    <div class="navbar navbar-default navbar-fixed-top navtrans">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="https://localhost/home.html">WD</a>
      </div>
      <div class="navbar-collapse collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="https://localhost/home.html">Home&nbsp;&nbsp;</a></li>
          <li><a href="https://localhost/php/logout.php">LogOut&nbsp;&nbsp;</a></li>
          <!-- <li><a href="javascript:void(0)">Buy&nbsp;&nbsp;</a></li>
          <li><a href="https://localhost/register.php">Sell&nbsp;&nbsp;</a></li> -->
        </ul>
      </div>
    </div>
  </div>
  </br>
  </br></br>
<!-- End NavBar -->
<div class="container-fluid">
	<h1>Admin Panel</br><small>Admin List</small></h1>
	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>ADMIN ID</th>
	      <th>Email</th>
	      <th>Operation</th>
	    </tr>
	  </thead>
    <tbody>
      <tr>
      <td><?php echo $curr_ID ?></td>
      <td><?php echo $curr_Email ?></td>
      <td></td>
      </tr>
	  <?php
	  $query=mysql_query("SELECT aid,email FROM admin where email!='$curr_Email'");
	  while($rows=mysql_fetch_array($query))
	  {
		  echo '<td>';
		  echo  $rows['aid'];
		  echo '</td>';
		  echo '<td>';
		  echo  $rows['email'];
		  echo '</td>';
		  echo '<td>';
		  echo '<a href="adminpage.php?opr=dele&uid='.$rows['aid'].'" class="btn btn-danger btn-raised btn-sm confirmation_for_admin">Remove From Admin</a>';  
		  echo '</td>';
		  echo '</tr>';
		  echo '</tbody>';
	  }
	 ?>
	</table>
  <button class="btn btn-lg btn-raised btn-primary" data-toggle="modal" data-target="#myModal">Add Admin</button>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Users</h4>
        </div>
        <div class="modal-body">
        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th>USER ID</th>
              <th>Email</th>
              <th>Operation</th>
            </tr>
          </thead>
          <tbody>
          <tr>
        <?php
        $query=mysql_query("SELECT userID,email FROM wusers");
          while($rows=mysql_fetch_array($query))
          {
            echo '<td>';
            echo  $rows['userID'];
            echo '</td>';
            echo '<td>';
            echo  $rows['email'];
            echo '</td>';
            echo '<td>';
            echo '<a href="adminpage.php?opr=add&uid='.$rows['userID'].'" class="btn btn-info btn-raised btn-sm">ADD as Admin</a>';  
            echo '</td>';
            echo '</tr>';
            echo '</tbody>';
          }
        ?>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/material.min.js"></script>     
    <script src="./js/ripplesinit.js"></script> 
    <script src="./js/ripples.min.js"></script>
    <script src="./js/confirmate.js"></script>
</body>
</html>