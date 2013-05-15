
<?php

require_once('connection.php');


$mid = $_POST['mid'];
$comment = $_POST['comment'];

$q1 = mysql_query("update mails set tutor_status=1, student_status = 0,tutor_comment='".$comment."' where id=".$mid);



?>

