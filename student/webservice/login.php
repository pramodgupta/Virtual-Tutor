
<?php

require_once('connection.php');


if (!empty($_GET))
{
	$username = $_GET['username'];
	$password = $_GET['password'];


$q1 = mysql_query("select * from login_students where username = '".$username."' and password='".$password."'");

$rows = mysql_num_rows($q1);

		if($rows != 0)
		{
		while($res = mysql_fetch_array($q1))
		{
			$result = array('result'=>$res['id']);
		}	
		}
		else
		{
			$result = array('result'=>0);
		}

}
else
{
	$result = array('result'=>'No Data');
}

header('Content-type: application/json');

echo json_encode($result);

?>
