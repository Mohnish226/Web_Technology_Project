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

function newcar()
{
	$Vehicle_Type='Car';
	$flag=1;
	$company=$_POST['company'];
	$model=$_POST['model'];
	$fuel=$_POST['fuelh'];
	$year=$_POST['year'];
	$kms=$_POST['kms'];
	$state=$_POST['stateh'];
	$city=$_POST['city'];
	$price=$_POST['price'];
	$details=$_POST['details'];
    $phone_no=$_POST['cphone_no'];
    $target_dir = "../uploads/";  
    $id=$_SESSION["ID"];
    //for image_front
	$target_file =$target_dir. basename($_FILES["cimage_front"]["name"]);    
	if(move_uploaded_file($_FILES["cimage_front"]["tmp_name"], $target_file))
	{         
			$flag=1;     
	}      
	else      
	{      
		 $flag=0;
	}
	$image1=basename( $_FILES["cimage_front"]["name"],".jpg");

	//for image_right
	$target_file2 = $target_dir.basename($_FILES["cimage_right"]["name"]);
    if (move_uploaded_file($_FILES["cimage_right"]["tmp_name"], $target_file2)) 
    {
        $flag=1;
    } 
    else 
    {
        $flag=0;
    }
    $image2=basename( $_FILES["cimage_right"]["name"],".jpg");

    //for image_left
	$target_file3 = $target_dir.basename($_FILES["cimage_left"]["name"]);
    if (move_uploaded_file($_FILES["cimage_left"]["tmp_name"], $target_file3)) 
    {
        $flag=1;
    } 
    else 
    {
        $flag=0;
    }
    $image3=basename( $_FILES["cimage_left"]["name"],".jpg");

    //for image_rear
    $target_file4 = $target_dir.basename($_FILES["cimage_rear"]["name"]);
    $imageFileType = pathinfo($target_file4,PATHINFO_EXTENSION);
    
    if (move_uploaded_file($_FILES["cimage_rear"]["tmp_name"], $target_file4)) 
    {
        $flag=1;
    } 
    else 
    {
        $flag=0;
    }
    $image4=basename( $_FILES["cimage_rear"]["name"],".jpg");

    //for image_inside
    $target_file5 = $target_dir.basename($_FILES["cimage_in"]["name"]);
    $imageFileType = pathinfo($target_file5,PATHINFO_EXTENSION);
    if (move_uploaded_file($_FILES["cimage_in"]["tmp_name"], $target_file5)) 
    {
        $flag=1;
    } 
    else 
    {
        $flag=0;
    }
    $image5=basename( $_FILES["cimage_in"]["name"],".jpg"); 
	$query = "INSERT INTO Vehicles (Vehicle_Type,maker,model,fuel,year,kms,state,city,price,details,Phone_number,UserId,Image_Front,Image_Right,Image_Left,Image_Rear,Image_Inside) VALUES ('$Vehicle_Type','$company','$model','$fuel',$year,$kms,'$state','$city',$price,'$details','$phone_no','$id','$image1','$image2','$image3','$image4','$image5')";

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
    	echo("Car Registration Is Completed.........");
    }
}

function register_car()
{
	if(!empty($_POST['company']) && !empty($_POST['fuelh']) && !empty($_POST['stateh']))
	{
		
		newcar();
	}
	else
	{
		echo("Please Select Appropriate Option");
	}
}

if((isset($_POST['submit']))&& isset($_FILES['cimage_front'])&& isset($_FILES['cimage_right'])
	&& isset($_FILES['cimage_left']) && isset($_FILES['cimage_rear']) && isset($_FILES['cimage_in']))
{
	register_car();

}
else
{
	echo "Something Went Wrong.........";
    echo $_SESSION["ID"];

}

?>