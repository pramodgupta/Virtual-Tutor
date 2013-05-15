
<?php

require_once('connection.php');


$tutor_id = $_GET['tutor_id'];


$q1 = mysql_query("select * from mails where tutor_status = 0 and tutor_id=".$tutor_id);

$rows = mysql_num_rows($q1);



	$exam[] =  array('count'=>$rows);



header('Content-type: application/json');
echo json_encode($exam);


?>

