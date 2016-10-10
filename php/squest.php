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

function getanswer()
{
	$quest=$_POST['questionh'];
	$ans=$_POST['answer'];
	$id=$_SESSION["ID"];
	$sql=mysql_query("UPDATE wusers SET s_quest='$quest' and s_ans='$ans' WHERE id='$id'");
	echo "DONE";

}

if(isset($_POST['submit']))
{
	getanswer();
}