
<?php

require_once('connection.php');


$student_id = $_GET['student_id'];


$q1 = mysql_query("select * from mails where student_status = 0 and student_id=".$student_id);

$rows = mysql_num_rows($q1);



	$exam[] =  array('count'=>$rows);



header('Content-type: application/json');
echo json_encode($exam);


?>

