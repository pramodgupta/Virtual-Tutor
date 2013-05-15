
<?php

require_once('connection.php');

$tutor_id = $_GET['tutor_id'];


$q1 = mysql_query("select a.id, b.name, a.submitted, a.tutor_status from mails a, students b where a.student_id = b.id and tutor_id = ".$tutor_id." order by tutor_status , submitted desc");
$rows = mysql_num_rows($q1);

while($r = mysql_fetch_array($q1))
{
	$class[] =  array('student_name'=>$r[1],'mail_id'=>$r[0],'date'=>$r[2], 'status'=>$r[3]);
}

header('Content-type: application/json');
echo json_encode($class);


?>
