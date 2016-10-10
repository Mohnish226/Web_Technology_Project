<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());


function NewUser()
{	
	$email = $_POST['email'];
	$password =  $_POST['pass'];
	$epassword=md5($password);
	$query = "INSERT INTO wusers (email,pass) VALUES ('$email','$epassword')";
	$data = mysql_query ($query)or die(mysql_error());
	if($data)
	{
	echo "YOUR REGISTRATION IS COMPLETED...";
	}
	session_start();
	$_SESSION["Email"] = $email;
	$_SESSION["login"] = 1;
	$query2 = mysql_query("SELECT *  FROM wusers where email = '$_POST[email]' AND pass = '$epassword'") or die(mysql_error());
	$row = mysql_fetch_array($query2);
	$_SESSION["ID"]=$row['userID'];
	header("Location: https://localhost/afterlogin.php");
}

function SignUp()
{
if(!empty($_POST['email']))
{
	$query = mysql_query("SELECT * FROM wusers WHERE email = '$_POST[email]'") or die(mysql_error());

	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{
		newuser();
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	}
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>