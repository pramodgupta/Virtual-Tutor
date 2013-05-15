
<?php

require_once('connection.php');
$time = time();
$student_id = $_GET['student_id'];

$q1 = mysql_query("select * from online_status where student_id =".$student_id) or die(mysql_error());

$rows = mysql_num_rows($q1);
if($rows != 0)
{
	$q2 = mysql_query("update online_status set time_online=".$time." where student_id = ".$student_id);
	
}
else
{
	$q2 = mysql_query("insert into online_status (student_id,time_online) values(".$student_id.",".$time.")");
}

?>
