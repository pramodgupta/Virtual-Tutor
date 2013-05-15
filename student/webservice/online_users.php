
<?php

require_once('connection.php');
$time = time();

$time = $time - 60*10;
$q1 = mysql_query("select a.student_id, b.name,a.time_online from online_status a, students b where a.student_id = b.id and a.time_online > '".$time."'") or die(mysql_error());
$rows = mysql_num_rows($q1);

while($r = mysql_fetch_array($q1))
{
	$class[] =  array('student_id'=>$r[0],'time'=>$r[2],'student_name'=>$r[1]);
}

header('Content-type: application/json');
echo json_encode($class);


?>
