<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

function SignIn()
{
	#$admin="mohnish226@gmail.com";
	#$admin1="harshal@dange";
	#session_start();
	$flag=1;   
	if(!empty($_POST['user']))   
	{
		$Username=$_POST['user'];
		$epass=md5($_POST['pass']);
		$query = mysql_query("SELECT email,pass FROM admin ");
		while($row = mysql_fetch_array($query))
		{
    		$admins[] = $row['email'];
    		$adminp[] = $row['pass'];
    	}
		$limit=count($admins);
		for($x=0;$x<$limit;$x++)
		{
			if($Username==$admins[$x] && $epass==$adminp[$x])
			{
				session_start();
				$_SESSION['email'] =$Username;
				$query2 = mysql_query("SELECT *  FROM admin where email ='$Username' AND pass ='$epass'") or die(mysql_error());
				$row = mysql_fetch_array($query2);
				$_SESSION["ID"]=$row['aid'];
				$_SESSION["login"]=2;
				header("Location: https://localhost/adminpage.php");
			}
		}
		$query = mysql_query("SELECT *  FROM wusers where email = '$_POST[user]' AND pass = '$epass'") or die(mysql_error());
		$row = mysql_fetch_array($query) or die(mysql_error());
		if($row)
		{
			session_start();
			$_SESSION['email'] = $row['pass'];
			$_SESSION["Email"]=$row['email'];
			$_SESSION["ID"]=$row['userID'];
			$_SESSION["login"]=1;
			header("Location: https://localhost/afterlogin.php");
		}
		else
		$flag=0;
		
	}
}
if(isset($_POST['submit']))
{
	SignIn();
}

?>