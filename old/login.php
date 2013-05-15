
<?php
$conn = mysql_connect('localhost','root','') or die(mysql_error());

//Selecting the Database
$db = mysql_select_db('kdm') or die(mysql_error());

if (!empty($_POST))
{
	$username = $_POST['user'];
	$password = $_POST['pass'];


$q1 = mysql_query("select * from login where username = '".$username."' and password='".$password."'");

$rows = mysql_num_rows($q1);

if($rows != 0)
{
	echo "success";
	
}
else
{
	echo "failed";
}

}



?>
