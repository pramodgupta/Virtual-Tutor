
<?php

require_once('connection.php');

$user_id = $_GET['user_id'];


$q1 = mysql_query("select distinct(a.name),a.id from class_details a, class b where a.id = b.class and b.user_id = ".$user_id) or die(mysql_error());
$rows = mysql_num_rows($q1);

while($r = mysql_fetch_array($q1))
{
	$class[] =  array('class'=>$r[0],'class_id'=>$r[1]);
}

header('Content-type: application/json');
echo json_encode($class);


?>
