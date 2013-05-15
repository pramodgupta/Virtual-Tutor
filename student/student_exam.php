<?php include('header.php') ; ?>
      <center> <h2> Student List of Exams</h2></center>
		<div id="x">
			<ul data-role="listview" data-inset="true">
                
             <?php
			 $class_id = $_GET['class_id'];
			 $student_id = $_SESSION['student_id'];
			
					
$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/student/webservice/students_exam.php?class_id=".$class_id."&student_id=".$student_id));

foreach($jsonObject as $exam)
{
	if($exam->exam_status == 1)
	{
		echo '<li> <a data-transition="slide"  href="http://170.225.98.69/vt/student/exam_details.php?exam_id='.$exam->exam_id.'">'.$exam->exam_name.'</a></li>';
	}
	else
	{
		echo '<li> <a data-transition="slide" data-theme="b" class="notdone" href="http://170.225.98.69/vt/student/exam_submit.php?exam_id='.$exam->exam_id.'">'.$exam->exam_name.'</a></li>';
	}
}
?>			 
				
					</ul>
					
					
		</div>
       
	   <?php include('footer.php') ; ?>