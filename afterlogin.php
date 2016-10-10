<?php
session_start();
?>
<?php 
if($_SESSION['login']==0) {
    header("Location: https://localhost/signup.html");
}
if($_SESSION["login"]==2) {
    header("Location: https://localhost/adminpage.php");
}
else{
    // header("Location: https://localhost/register.php");
}?>
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
?>
<?php
$curr_ID=$_SESSION['ID'];
$curr_Email=$_SESSION["Email"];
$result=mysql_query("SELECT vid from vehicles WHERE Vehicle_Type='Bike' AND userID=$curr_ID");
$totbike=mysql_num_rows($result);
$result=mysql_query("SELECT vid from vehicles WHERE Vehicle_Type='Car' AND userID=$curr_ID");
$totcar=mysql_num_rows($result);
if(isset($_GET['opr']) && isset($_GET['vid']))
{
    $epr=$_GET['opr'];
    $cv=$_GET['vid'];
    if($epr =='dele')
    {
     
      $data=mysql_query("DELETE FROM vehicles WHERE vid='$cv' ");
      if($data)
      {
        header("location: https://localhost/afterlogin.php");
      }
      else
      {
        echo "Erro:".mysql_error();
      }
    }
    if($epr =='edit')
    {
     
      $data=mysql_query("UPDATE vehicles SET sold=1 WHERE vid='$cv' ");
      if($data)
      {
        header("location: https://localhost/afterlogin.php");
      }
      else
      {
        echo "Error:".mysql_error();
      }
    }
}
?> 
<!DOCTYPE html>
<html>
<head>
	<title>After Login</title>
	<!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/main.css" rel="stylesheet">
    <link href="./css/rl1.css" rel="stylesheet">
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
          <li><a href="javascript:void(0)">Buy&nbsp;&nbsp;</a></li>
          <li><a href="https://localhost/register.php">Sell&nbsp;&nbsp;</a></li>
          <li><a href="https://localhost/php/logout.php">LogOut&nbsp;&nbsp;</a></li>

        </ul>
      </div>
    </div>
  </div>
  </br>
  </br></br>
<!-- End NavBar -->
<div class="container-fluid">
 <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Your Posts</h3>
    </div>
    <div class="panel-body">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Cars   <span class="badge"><?php echo $totcar;?></span>
            </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
             <div class="panel-body">
                <?php
                    $sql=mysql_query("SELECT maker,model,state,city,price,year,kms,Image_Front,sold,vid FROM vehicles WHERE userID=$curr_ID AND Vehicle_Type='Car' ");

                    while($rows=mysql_fetch_array($sql))
                    {
                      echo '<div class="thumbnail">';
                      echo "<center>";
                      echo '<table> <tr>';
                      $images = "uploads/$rows[7].jpg";
                      echo '<td rowspan="4" colspan="3"><img src="'.$images.'"  height="200px" width="200px"></td>';
                      echo '<td height="50" align="center" class="td" colspan="3"> ';
                      echo '<i class="material-icons">build</i>';
                      echo $rows['maker'];
                      echo " ";
                      echo $rows['model'];
                      echo '</td></tr>';
                      echo '<tr>';
                      echo '<td height="50" colspan="1" align="left ">';
                      echo '<i class="material-icons">local_atm</i>';
                      echo "  ";
                      echo $rows['price'];
                      echo '</td>';
                      echo '<td height="50" colspan="1" align="left ">';
                      echo '<i class="material-icons">local_atm</i>';
                      echo "  ";
                      $status=$rows[8];
                      if($status==0)
                      {
                          echo 'Avaliable';
                      }
                      else
                      { 
                        echo 'Sold';
                      }
                      echo '</td>';
                      echo "</tr>";
                      echo "<tr>";
                      echo '<td height="50" class="td" colspan="2">';
                      echo '<i class="material-icons">place</i>';
                      echo $rows['city'];echo',';
                      echo $rows['state'];
                      echo '</td> </tr>';
                      echo "<tr>";
                      echo '<td height="50" colspan="1">';
                      echo '<i class="material-icons">date_range</i>';
                      echo $rows['year'];
                      echo '<td height="50" colspan="1">';
                      echo '<i class="material-icons">traffic</i>';
                      echo $rows['kms'];echo " Kms";
                      echo "</td></tr>
                      </table>";
                      echo "</center>";
                      $id=$rows['vid'];
                      echo '<a href="afterlogin.php?opr=dele&vid='.$rows['vid'].'"" class="btn btn-danger btn-raised btn-sm confirmation">Delete Post</a>';
                      echo '<a href="afterlogin.php?opr=edit&vid='.$rows['vid'].'" class="btn btn-primary btn-raised btn-sm" data-container="body" data-toggle="popover" data-placement="top" data-content="Change The Vehicle Status To Sold">Change Status</a>';
                      echo "</left></div>";
                      }
                ?>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Bikes     <span class="badge"><?php echo $totbike;?></span>
            </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              <?php
                $sql=mysql_query("SELECT maker,model,state,city,price,year,kms,Image_Front,sold,vid FROM vehicles WHERE userID=$curr_ID AND Vehicle_Type='Bike' ");

                   while($rows=mysql_fetch_array($sql))
                    {
                      echo '<div class="thumbnail">';
                      echo "<center>";
                      echo '<table> <tr>';
                      $images = "uploads/$rows[7].jpg";
                      echo '<td rowspan="4" colspan="3"><img src="'.$images.'"  height="200px" width="200px"></td>';
                      echo '<td height="50" align="center" class="td" colspan="3"> ';
                      echo '<i class="material-icons">build</i>';
                      echo $rows['maker'];
                      echo " ";
                      echo $rows['model'];
                      echo '</td></tr>';
                      echo '<tr>';
                      echo '<td height="50" colspan="1" align="left ">';
                      echo '<i class="material-icons">local_atm</i>';
                      echo "  ";
                      echo $rows['price'];
                      echo '</td>';
                      echo '<td height="50" colspan="1" align="left ">';
                      echo '<i class="material-icons">local_atm</i>';
                      echo "  ";
                      $status=$rows[8];
                      if($status==0)
                      {
                          echo 'Avaliable';
                      }
                      else
                      { 
                        echo 'Sold';
                      }
                      echo '</td>';
                      echo '</tr>';
                      echo '<tr>';
                      echo '<td height="50" class="td" colspan="2">';
                      echo '<i class="material-icons">place</i>';
                      echo $rows['city'];echo',';
                      echo $rows['state'];
                      echo '</td> </tr>';
                      echo "<tr>";
                      echo '<td height="50" colspan="1">';
                      echo '<i class="material-icons">date_range</i>';
                      echo $rows['year'];
                      echo '<td height="50" colspan="1">';
                      echo '<i class="material-icons">traffic</i>';
                      echo $rows['kms'];echo " Kms";
                      echo "</td></tr>
                      </table>";
                      echo "</center>";
                      $id=$rows['vid'];
                      echo '<a href="afterlogin.php?opr=dele&vid='.$rows['vid'].'" class="btn btn-danger btn-raised btn-sm confirmation">Delete Post</a>';
                      echo '<a href="afterlogin.php?opr=edit&vid='.$rows['vid'].'" class="btn btn-primary btn-raised btn-sm" data-container="body" data-toggle="popover" data-placement="top" data-content="Change The Vehicle Status To Sold">Change Status</a>';
                      echo "</left></div>";
                      }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Your Profile</h3>
    </div>
    <div class="panel-body">
      <form>
        <fieldset><div class="jumbotron">
          <div class="form-group">
            <label><i class="material-icons">person</i>  E-Mail :</label>
            <?php echo $curr_Email;?>
          </div></div>
        </fieldset>
      </form>
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