
<?php

require_once('connection.php');

$student_id = $_POST['student_id'];



$q1 = mysql_query("select * from mails where student_status = 0 and mail_checker = 0 and tutor_id = ".$student_id." order by submitted desc") or die(mysql_error());
$rows = mysql_num_rows($q1);
$id = 0;
while($data = mysql_fetch_array($q1))
{
 $id = $data[0];
}

if($id != 0)
{
$q2 = mysql_query("update mails set mail_checker= 1 where  id=".$id);
}

echo $id;
?>
