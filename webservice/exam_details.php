
<?php

require_once('connection.php');


$exam_id = $_GET['exam_id'];
$qid = $_GET['qid'];



$q1 = mysql_query("select a.question_id, a.question, a.option1, a.option2, a.option3, a.option4, a.solution, b.answer, a.question_type, b.answering_time from exam_question a LEFT JOIN exam_student b on a.exam_id = b.exam_id and a.question_id=b.question_id where a.question_id=".$qid." and a.exam_id=".$exam_id) or die(mysql_error());
//$q1 = mysql_query("select a.question_id, a.question, a.option1, a.option2, a.option3, a.option4, a.solution, b.answer, a.question_type from exam_question a LEFT JOIN exam_student b on a.exam_id = b.exam_id and a.question_id=b.question_id where a.exam_id = 2");
$rows = mysql_num_rows($q1);
if($rows)
{
while($r = mysql_fetch_array($q1))
{

	$exam[] =  array('question_id'=>$r[0],'question'=>$r[1],'option1'=>$r[2],'option2'=>$r[3],'option3'=>$r[4],'option4'=>$r[5],'solution'=>$r[6],'answer'=>$r[7],'question_type'=>$r[8],'answering_time'=>$r[9]);
}
}
else
{
	$exam[]=array('question_id'=>0);
}

header('Content-type: application/json');
echo json_encode($exam);


?>

