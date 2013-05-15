
<?php

require_once('connection.php');

$student_id = $_GET['student_id'];
$class_id = $_GET['class_id'];
$q1 = mysql_query("select id from exam where class_id=".$class_id);
$class_ids = '';
while($res = mysql_fetch_array($q1))
{
	$class[]= $res[0];
}

$ids = implode($class,',');

$q2 = mysql_query("select distinct(a.exam_id), b.exam_name, a.submitted_date from exam_student a, exam b where a.exam_id = b.id and a.exam_id in (".$ids.")and a.student_id = ".$student_id) or die(mysql_error());


$rows = mysql_num_rows($q2);

while($r = mysql_fetch_array($q2))
{

	$exam[] =  array('exam_id'=>$r[0],'exam_name'=>$r[1],'submitted_date'=>$r[2]);
}

if($rows == 0)
{
$exam[] =  array('exam_id'=>0);
}

header('Content-type: application/json');
echo json_encode($exam);


?>
