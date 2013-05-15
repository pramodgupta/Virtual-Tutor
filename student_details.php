<?php require_once('header.php') ;?>
      <center> <h2> Exam List</h2></center>
		<div id="x">
			<ul data-role="listview" data-inset="true">
                
             <?php
			 $student_id = $_GET['student_id'];
			 $_SESSION['student_id'] = $student_id;
			$class_id = $_SESSION['class_id'];
$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/webservice/students_exam.php?student_id=".$student_id."&class_id=".$class_id));

foreach($jsonObject as $exam)
{
$exam_id = $exam->exam_id;
if($exam_id != 0)
{
	echo '<li> <a href="http://170.225.98.69/vt/exam_details.php?exam_id='.$exam->exam_id.'">'.$exam->exam_name.'</a>';
	echo '<p style="padding: 3px 15px;"><label style="font-weight:bold;">Submitted on :  </label>'.$exam->submitted_date.'  </p>';
	echo '</li>';
	}
	else
	{
	echo '<li> No Exams Taken</li>';
	}
}
?>			 
				
					</ul>
		</div>
       
	<?php require_once('footer.php') ;?>