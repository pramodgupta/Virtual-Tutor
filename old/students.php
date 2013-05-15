
<?php
$conn = mysql_connect('localhost','root','') or die(mysql_error());

//Selecting the Database
$db = mysql_select_db('kdm') or die(mysql_error());

if (!empty($_POST))
{
	$user_id = $_POST['user_id'];
	


$q1 = mysql_query("select * from students");
$clas =" "; 
while($r = mysql_fetch_array($q1))
{
	$class = $r["name"];
	$clas = $class.",".$clas;
	}

	
}
echo $clas;
?>
