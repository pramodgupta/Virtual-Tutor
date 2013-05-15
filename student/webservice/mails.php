
<?php

require_once('connection.php');

$student_id = $_GET['student_id'];


$q1 = mysql_query("select a.id, b.username, a.submitted, a.student_status from mails a, login b where a.tutor_id = b.id and a.student_id = ".$student_id." order by tutor_status , submitted desc");
$rows = mysql_num_rows($q1);

while($r = mysql_fetch_array($q1))
{
	$class[] =  array('tutor_name'=>$r[1],'mail_id'=>$r[0],'date'=>$r[2],'student_status'=>$r[3]);
}

header('Content-type: application/json');
echo json_encode($class);


?>
