<?php
session_start();
?>
<?php 
if($_SESSION['login']==0) {
    header("Location: https://localhost/signup.html");
}
else{
    // header("Location: https://localhost/register.php");
}?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- <meta charset="utf-8"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap-material-design.css">
    <!-- Custom CSS -->
    <link href="./css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
      <div class="navbar navbar-default navbar-fixed-top navtrans">
      <div class="container-fluid">
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
            <li><a href="https://localhost/rl1.php">Buy&nbsp;&nbsp;</a></li>
            <li><a href="https://localhost/register.php">Sell&nbsp;&nbsp;</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="https://localhost/signup.html">Login</a></li>
                <li><a href="https://localhost/signup.html">Signup</a></li>
                <li><a href="https://localhost/php/logout.php">LogOut</a></li> 
                </ul>
            </li>
         </ul>
        </div>
      </div>
    </div>

<?php
include 'rl.php';
$id = $_POST['id1'];
$sql= mysql_query("SELECT Image_Right,Image_Front,Image_Left,Image_Rear,Image_Inside,maker,model,state,price,year,kms,vid,phone_number,fuel FROM vehicles WHERE ( vid = '$id' )");
$row = mysql_fetch_row($sql);
$recc=mysql_query("SELECT Image_Right,maker,model,state,price,year,kms,vid FROM vehicles WHERE state like '%{$row[7]}%' AND price<='$row[8]' AND vid!= '$row[11]' order by price desc limit 3");



?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-8">

                <div class="row carousel-holder">

                    <div class="col-md-12 thumbnail">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                            </ol>
                            <div class="carousel-inner" style="height: 360px;">
                                <div class="item active">
                                    <?php echo '<img class="slide-image" src="./uploads/'.$row[0].'.jpg" alt="">';?>
                                    <!-- <img class="slide-image" src="<?php //echo './uploads/'.$row[0].'';?>" alt=""> -->
                                </div>
                                <div class="item">
                                    <?php echo '<img class="slide-image" src="./uploads/'.$row[1].'.jpg" alt="">';?>
                                    <!-- <img class="slide-image" src="<?php //echo './uploads/'.$row[1].'';?>" alt=""> -->
                                </div>
                                <div class="item">
                                    <?php echo '<img class="slide-image" src="./uploads/'.$row[2].'.jpg" alt="">';?>
                                     <!-- <img class="slide-image" src="<?php //echo './uploads/'.$row[2].'';?>" alt=""> -->
                                </div>
                                <div class="item">
                                    <?php echo '<img class="slide-image" src="./uploads/'.$row[3].'.jpg" alt="">';?>
                                     <!-- <img class="slide-image" src="<?php //echo './uploads/'.$row[3].'';?>" alt=""> -->
                                </div>
                                <div class="item">
                                    <?php echo '<img class="slide-image" src="./uploads/'.$row[4].'.jpg" alt="">';?>
                                     <!-- <img class="slide-image" src="<?php //echo './uploads/'.$row[4].'';?>" alt=""> -->
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                        <br><br>
                        <center><h2><?php echo $row[5]; echo '  ';
                        echo $row[6];?></h2>
                        <h4>Price: <b><?php echo $row[8];?></b></h4></center><hr>
                        <center><h2>Seller's Details: </h2>
                        <h4>User id:<b><?php echo $row[7];?></b></h4>
                        <h4><b>Phone no:<?php echo $row[12];?></b></h4></center><hr>
                        <center><div class="col-md-3"><span class="glyphicon glyphicon-scale btn-lg" aria-hidden="true"></span><br>Fuel:<br><?php echo $row[13];?></div></center>
                        <center><div class="col-md-3"><span class="glyphicon glyphicon-calendar btn-lg" aria-hidden="true"></span><br>Year of Purchase:<br><?php echo $row[9];?></div></center>
                        <center><div class="col-md-3"><span class="glyphicon glyphicon-road btn-lg" aria-hidden="true"></span><br>Kms. driven:<br><?php echo $row[10];?></div></center>
                        <center><div class="col-md-3"><span class="glyphicon glyphicon-map-marker btn-lg" aria-hidden="true"></span><br>Location:<br><?php echo $row[7];?></div></center>
                        
                    </div>
<br><br>
                </div>
            </div><div class="col-md-1"></div>
            <div class="col-md-3">
                <div class="row">
                 <?php
                   while($recrows = mysql_fetch_array($recc))
                   {
                      echo '
                        <div class="thumbnail">
                            <img src="./uploads/'.$recrows[0].'.jpg" alt=""class="cropper1 img-responsive" style="height: 150px; ">
                            <div class="caption">';
                                echo '<h4 class="pull-right">';
                                echo $recrows[4];
                                echo '</h4>';
                                echo '<h4>';
                                echo $recrows[1];echo '  ';
                                echo $recrows[2];
                                echo '</h4><br>';
                                echo '<center><div class="col-md-3"><span class="glyphicon glyphicon-scale" aria-hidden="true"></span><br>';
                                echo 'fuel';
                                echo '</div></center>';
                                echo '<center><div class="col-md-3"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><br>';
                                echo $recrows[5];
                                echo '</div></center>';
                                echo '<center><div class="col-md-3"><span class="glyphicon glyphicon-road" aria-hidden="true"></span><br>';
                                echo $recrows[6];
                                echo '</div></center>';
                                echo '<center><div class="col-md-3"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><br>';
                                echo $recrows[3];
                                echo '</div></center>';
                        echo '</div>
                    </div>';
                    }?>
                    </div>
                  </div> 

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--<script src="./js/jquery.js"></script>-->
    <script src="./js/material.min.js"></script>
    <script src="./js/ripples.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="./js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $("#carousel-example-generic").carousel();
    </script>

</body>

</html>
