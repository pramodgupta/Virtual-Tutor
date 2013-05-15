
<?php

require_once('connection.php');

$student_name = $_GET['student_name'];


$q1 = mysql_query("select distinct(a.name),a.id from class_details a, students b where a.id = b.class_id and b.name = '".$student_name."'") or die(mysql_error());

$rows = mysql_num_rows($q1);

while($r = mysql_fetch_array($q1))
{
	$class[] =  array('class'=>$r[0],'class_id'=>$r[1]);
}

header('Content-type: application/json');
echo json_encode($class);


?>
