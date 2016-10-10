<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="./css/bootstrap-material-design.css">
	<link rel="stylesheet" href="./css/animate.css"><!-- Animate.css file included -->
	<link rel="stylesheet" type="text/css" href="./css/rl.css"><!-- custom css -->
	
</head>
<body>

	<!-- navbar -->

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

	<!-- layout of page starts -->

	<div class="container">
		<div class="row">

			<!-- left section--> 
			<div class="col-md-4">
			<!-- Changes made in class name in the div below -->
				<div class="well div-height accordion-collapse" id="left">
					<div class="container">
						<!-- <h4><center>Form</center></h4> -->
						<hr/>
						<!--accordian sidebar-->
						<!-- Removed the classes of the div below -->
						 <div>
							<div class="panel-group wrap" id="accordion" role="tablist" aria-multiselectable="true">

								<!--technology 1 -->
								
								<div class="panel">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
												Compulsary fields:<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
											</a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body intermediate">
										<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
											Brand:<br>
											<select name="brand1" class="form-control">
											    <?php
											    if(isset($_POST['brand1']))
											    {
											    	$brand2=$_POST['brand1'];
											    	echo '<option value="'.$brand2.'">';
											    	echo "Selected:";
											    	echo $brand2;
											    	echo '</option>';
											    }

											    include 'rl.php';
                                        
											
											    $brandsql= mysql_query("SELECT distinct maker FROM vehicles ");

    

								                   while($row1=mysql_fetch_array($brandsql))
								                   	{
								                   		echo '<option value="'.$row1[0].'">';
								                   		echo $row1[0];
								                   		echo '</option>';
								                   	}	
								                   	?>
  											</select>
  											</div>
  										<div class="panel-body easy">
											Model:<br><input type="text" name="model1" placeholder="model" class="form-control" value="<?php echo isset($_POST['model1']) ? $_POST['model1'] : '' ?>" />
										</div>
											
											
                                            
										<div class="panel-body intermediate">
											Your Budget:
											<select name="price1" class="form-control">
											<?php
											    if(isset($_POST['price1']))
											    {
											    	$price2=$_POST['price1'];
											    	echo '<option value="'.$price2.'">';
											    	echo "Selected:";
											    	echo $price2;
											    	echo '</option>';
											    }



											    ?>
											    <option value="200000">2 Lacs</option>
											    <option value="400000">4 Lacs</option>
											    <option value="600000">6 Lacs</option>
											    <option value="800000">8 Lacs</option>
											    <option value="1500000">15 Lacs</option>
											    <option value="2500000">25 Lacs</option>
											    <option value="2500000">More than 25 Lacs</option>
										   </select>
											
										</div>
										<div class="panel-body difficult">
											State:
											
											<select name="state1" class="form-control">
											<?php
											    if(isset($_POST['state1']))
											    {
											    	$state2=$_POST['state1'];
											    	echo '<option value="'.$state2.'">';
											    	echo "Selected:";
											    	echo $state2;
											    	echo '</option>';
											    }

											    $statesql= mysql_query("SELECT distinct state FROM vehicles ");

    

								                   while($row2=mysql_fetch_array($statesql))
								                   	{
								                   		echo '<option value="'.$row2[0].'">';
								                   		echo $row2[0];
								                   		echo '</option>';
								                   	}	

											    ?>
										   </select>
											<br>  
										</div>
										
										</div> 
								</div>
								        
							
								<!-- sorts 2 -->
								<div class="panel ">
									<div class="panel-heading " role="tab" id="headingTwo">
										<h4 class="panel-title ">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Sort By:<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
											</a>
										</h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
										<div class="panel-body easy">
											Sort by:
											<select name="sort" class="form-control">
											    <option value="0">Price(Low to High)</option>
											    <option value="1">Price(High to Low)</option>
											    <option value="2">Year of Prod.</option>
											    <option value="3">Kms. driven</option>
										   </select>
										</div>
										  
										
									</div>
								
								        
								</div>
								
							</div>
							<center>
										<input type="submit" class="btn btn-primary btn-lg"></center>
								        </form>
						</div>
					<!-- end of accordion sidebar-->
					 </div>
				</div>
			</div> 
			<!-- end of left section -->


			<!-- middle section -->
			<div class="col-md-6">
				<div class="div-height" id="middle">
					<!-- 3 transition divs (css- display: none) --> 
					<div class="well intro-well">
						<center>
							<div class="animated bounceInDown"> 
								<h3>Opening well </h3>
							</div>
						</center>
					</div>
					<!-- Thumbnail-->
					<?php
					if (!isset($_POST['SUBMIT'])){ 
                   
                   $brand = @$_POST['brand1'];
                   $model = @$_POST['model1'];
                   $price = @$_POST['price1'];
                   $state = @$_POST['state1'];
                   $sort = @$_POST['sort'];
                   if ($sort==0)
               {
                   if (($model==null || $model==''))
                   {
                   	$sql= mysql_query("SELECT Image_Right,maker,model,state,price,year,kms,vid,fuel FROM vehicles WHERE ( price <= '$price' ) AND maker like '%{$brand}%' AND state like '%{$state}%'order by price");

                   }
                   else
                   {
                   		$sql= mysql_query("SELECT Image_Right,maker,model,state,price,year,kms,vid,fuel FROM vehicles WHERE ( price <= '$price' ) AND maker like '%{$brand}%' AND model like '%{$model}%' AND state like '%{$state}%'order by price");
               		}
               	}

               	 if ($sort==1)
               {
                   if (($model==null || $model==''))
                   {
                   	$sql= mysql_query("SELECT Image_Right,maker,model,state,price,year,kms,vid,fuel FROM vehicles WHERE ( price <= '$price' ) AND maker like '%{$brand}%' AND state like '%{$state}%'order by price desc");

                   }
                   else
                   {
                   		$sql= mysql_query("SELECT Image_Right,maker,model,state,price,year,kms,vid,fuel FROM vehicles WHERE ( price <= '$price' ) AND maker like '%{$brand}%' AND model like '%{$model}%' AND state like '%{$state}%'order by price desc");
               		}
               	}

               	if ($sort==2)
               {
                   if (($model==null || $model==''))
                   {
                   	$sql= mysql_query("SELECT Image_Right,maker,model,state,price,year,kms,vid,fuel FROM vehicles WHERE ( price <= '$price' ) AND maker like '%{$brand}%' AND state like '%{$state}%'order by year desc");

                   }
                   else
                   {
                   		$sql= mysql_query("SELECT Image_Right,maker,model,state,price,year,kms,vid FROM vehicles WHERE ( price <= '$price' ) AND maker like '%{$brand}%' AND model like '%{$model}%' AND state like '%{$state}%'order by year desc");
               		}
               	}
               	if ($sort==3)
               {
                   if (($model==null || $model==''))
                   {
                   	$sql= mysql_query("SELECT Image_Right,maker,model,state,price,year,kms,vid,fuel FROM vehicles WHERE ( price <= '$price' ) AND maker like '%{$brand}%' AND state like '%{$state}%'order by kms");

                   }
                   else
                   {
                   		$sql= mysql_query("SELECT Image_Right,maker,model,state,price,year,kms,vid,fuel FROM vehicles WHERE ( price <= '$price' ) AND maker = '$brand' AND model like '%{$model}%' AND state like '%{$state}%'order by kms");
               		}
               	}

    

                   while($rows=mysql_fetch_array($sql))
                   	{
					echo '<div class="thumbnail">';
						echo '<table> <tr>';
							echo '<td rowspan="4" colspan="3"><img src="./uploads/'.$rows[0].'.jpg" class="cropper img-responsive"></td>';
							echo '<td height="50" align="center" class="tdh" colspan="3"> ';
							echo $rows[1];
							 echo '   ';
							echo $rows[2];
							echo '</td></tr>';
							echo '<tr>';
								echo '<td height="50" colspan="1" align="right">';
								echo '<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></td>';
								echo '<td height="50" colspan="2" align="left">';
								echo $rows[3];
								echo '</td>';
							echo "</tr>";
							echo "<tr>";
							echo '<td height="50" class="tdh" colspan="2">';
							echo $rows[4];
							echo '</td>';
							echo '<td height="50" colspan="1"><form action="rl2.php" method="post"><input type="hidden" name="id1" value="'.$rows[7].'"/>
							<input type="submit" value="Read more!">
							</form></td>
							</tr>';
							echo "<tr>";
								echo '<td height="50" colspan="1">';
								echo $rows[5];
								echo "  ";
								echo '<span class="glyphicon glyphicon-check" aria-hidden="true">
								</span></td>';
								echo '<td height="50" colspan="1">';
								echo $rows[6];
								echo '<span class="glyphicon glyphicon-check" aria-hidden="true"></span></td>
								<td height="50" colspan="1">';
								echo $rows[8];
								echo '<span class="glyphicon glyphicon-check" aria-hidden="true"></span></td>';
							echo "</tr>
							</table>";
					echo "</div>";
                     }

                     mysql_close();
                 }
					?>
					
					</div></div>

	<script src="./js/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script type="text/javascript" src="./js/resource_layout.js"></script>


<script type="text/javascript">$(function(){
    $(".form-control").typed({
        attr: "placeholder",
        typeSpeed: 100
    });
});</script>
</body>
</html>
