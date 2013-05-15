
<?php

require_once('connection.php');



		$exam_id = $_GET['exam_id'];
		$student_id = $_GET['student_id'];
		$question_id = $_GET['question_id'];
		$answer = $_GET['answer'];
		$answering_time = $_GET['answering_time'];
		$date_now = date('Y-m-d');
		if($answering_time == 0)
		{
			$answering_time = 12;
		}

		$query = mysql_query("insert into exam_student (exam_id, student_id, question_id, answer, answering_time,submitted_date) values('".$exam_id."','".$student_id."','".$question_id."','".$answer."','".$answering_time."','".$date_now."')") or die(mysql_error());


if($query)
{
	$exam[] = array('result'=>'yes');
}
else
{
	$exam[] = array('result'=>'no');
}

header('Content-type: application/json');
echo json_encode($exam);


?>

