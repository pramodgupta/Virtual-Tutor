
<?php
$conn = mysql_connect('localhost','root','') or die(mysql_error());

//Selecting the Database
$db = mysql_select_db('kdm') or die(mysql_error());


	$username = $_POST['user'];
	$password = $_POST['pass'];
	
	


$q1 = mysql_query("select * from login where username = '".$username."' and password='".$password."'");
$q2 = mysql_query("select * from login");
$rows = mysql_num_rows($q1);

while($res = mysql_fetch_array($q2))
{
	$results[] = array('students'=>array('id'=>$res['id'],'username'=>$res['username']));
	
}

if($rows != 0)
{
	$result['login'] = 0;
	
}
else
{
	$result['login'] = 0;
}

	header('Content-type: application/json');
	
		echo json_encode($results);
		
		
		

?>
