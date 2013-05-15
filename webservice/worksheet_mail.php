<!DOCTYPE html>
<html>
<head>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
   <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.js"></script>

</head>
<body>

<?php

			
			
?>

  <div data-role="page" id="callAjaxPage">
        <div data-role="header">
            <h1>Worksheet</h1>
        </div>
   <div data-role="content">

  
   
   
   <?php
   if(isset($_POST['submit']))
   {
	$comment = $_POST['comment'];
	$class_id = $_POST['class_id'];
	$student_id = $_POST['student_id'];
	$question_id = $_POST['question_id'];
	$exam_id = $_POST['exam_id'];
	$tutor_id = 1;
	$date = date('Y-m-d');
	include('connection.php');
$query = mysql_query("insert into mails (tutor_id, student_id, exam_id, question_id, comment, class_id,tutor_status,student_status,submitted) values(".$tutor_id.",".$student_id.",".$exam_id.",".$question_id.",'".$comment."',".$class_id.",0,1,'".$date."') ");
	if($query)
	{
	
			echo '<h3>Submitted Successfully</h3>';
	}
	
   }
   ?>
   
</div>
</div>
</body>
</html>

