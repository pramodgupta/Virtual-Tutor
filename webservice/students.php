
<?php

require_once('connection.php');

$class_id = $_GET['class_id'];


$q1 = mysql_query("select * from students where class_id = ".$class_id." order by name");
$rows = mysql_num_rows($q1);

while($r = mysql_fetch_array($q1))
{
	$class[] =  array('student_id'=>$r["id"],'student_name'=>$r["name"]);
}

header('Content-type: application/json');
echo json_encode($class);


?>
