
<?php

require_once('connection.php');

$student_id = $_GET['student_id'];
$class_id = $_GET['class_id'];


//$q1 = mysql_query("select distinct(a.exam_id), b.exam_name, a.submitted_date from exam_student a, exam b where a.exam_id = b.id and a.student_id = ".$student_id) or die(mysql_error());

$q1 = mysql_query("select id,exam_name,date from exam where class_id =".$class_id." order by date desc");


while($r = mysql_fetch_array($q1))
{
$row = 0;
	$exam_id = $r[0];
	$query2 = mysql_query("select * from exam_student where exam_id=".$exam_id." and student_id=".$student_id);
	$row = mysql_num_rows($query2);
	$flag = 0;
	if($row != 0)
	{
		$flag = 1;
	}
	$exam[] =  array('exam_id'=>$r[0],'exam_name'=>$r[1],'submitted_date'=>$r[2],'exam_status'=>$flag);
}

header('Content-type: application/json');
echo json_encode($exam);


?>
