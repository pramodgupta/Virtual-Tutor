
<?php

require_once('connection.php');


$mail_id = $_GET['mid'];
$q3 = mysql_query("update mails set student_status = 1 where id=".$mail_id);
$q1 = mysql_query("select * from mails where id=".$mail_id);

//$q1 = mysql_query("select a.question_id, a.question, a.option1, a.option2, a.option3, a.option4, a.solution, b.answer, a.question_type from exam_question a LEFT JOIN exam_student b on a.exam_id = b.exam_id and a.question_id=b.question_id where a.exam_id = 2");
$rows = mysql_num_rows($q1);
if($rows)
{
while($r = mysql_fetch_array($q1))
{

	$exam[] =  array('id'=>$r[0],'student_id'=>$r[2],'exam_id'=>$r[3],'question_id'=>$r[4],'comment'=>$r[5],'class_id'=>$r[6],'tutor_comment'=>$r['tutor_comment']);
}
}
else
{
	$exam[]=array('id'=>0);
}

header('Content-type: application/json');
echo json_encode($exam);


?>

