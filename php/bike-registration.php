<?php
session_start();
?>
<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

function newbike()
{
	$Vehicle_Type='Bike';
	$flag=1;
	$company=$_POST['bcompany'];
	$model=$_POST['bmodel'];
	$year=$_POST['yearb'];
	$kms=$_POST['bkms'];
	$state=$_POST['bstateh'];
	$city=$_POST['bcity'];
	$price=$_POST['bprice'];
	$details=$_POST['bdetails'];
	$phone_no=$_POST['bphone_no'];
	$target_dir = "../uploads/";  
	$id=$_SESSION["ID"];

	//for bimage_front
	$target_file=$target_dir. basename($_FILES["bimage_front"]["name"]);    
	if(move_uploaded_file($_FILES["bimage_front"]["tmp_name"], $target_file))
	{         
			$flag=1;     
	}      
	else      
	{      
		 $flag=0;
	}
	$image1=basename( $_FILES["bimage_front"]["name"],".jpg");
	
	//for bimage_right
	$target_file2 = $target_dir. basename($_FILES["bimage_right"]["name"]);
    if (move_uploaded_file($_FILES["bimage_right"]["tmp_name"], $target_file2)) 
    {
        $flag=1;
    } 
    else 
    {
        $flag=0;
    }
    $image2=basename( $_FILES["bimage_right"]["name"],".jpg");

    //for bimage_left
	$target_file3 = $target_dir. basename($_FILES["bimage_left"]["name"]);
    if (move_uploaded_file($_FILES["bimage_left"]["tmp_name"], $target_file3)) 
    {
        $flag=1;
    } 
    else 
    {
        $flag=0;
    }
    $image3=basename( $_FILES["bimage_left"]["name"],".jpg");

    //for bimage_rear
    $target_file4 = $target_dir. basename($_FILES["bimage_rear"]["name"]); 
    if (move_uploaded_file($_FILES["bimage_rear"]["tmp_name"], $target_file4)) 
    {
        $flag=1;
    } 
    else 
    {
        $flag=0;
    }
    $image4=basename( $_FILES["bimage_rear"]["name"],".jpg");

	$query = "INSERT INTO Vehicles (Vehicle_Type,maker,model,year,kms,state,city,price,details,Phone_number,UserId,Image_Front,Image_Right,Image_Left,Image_Rear) VALUES ('$Vehicle_Type','$company','$model',$year,$kms,'$state','$city',$price,'$details','$phone_no','$id','$image1','$image2','$image3','$image4')";
	$data = mysql_query ($query)or die(mysql_error());
	if($data)
	{
		$flag=1;
	}
	else
	{
		$flag=0;
	}
 
    if($flag==0)
    {
    	echo("Some Error Occured,Please Try Again........");
    }
    else
    {
    	echo("Bike Registration Is Completed.........");
    }
}

function register_bike()
{
	if(!empty($_POST['bcompany']) && !empty($_POST['bstateh']))
	{
		newbike();
	}
	else
	{
		echo("Please Select Appropriate Option..........");
	}
}

if((isset($_POST['submit']) && isset($_FILES['bimage_front'])&& isset($_FILES['bimage_right'])&&isset($_FILES['bimage_left']) && isset($_FILES['bimage_rear'])))
{
		register_bike();
}
else
{
	echo "Something Went Wrong";
}
?>