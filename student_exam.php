<?php require_once('header.php') ;?>
  
  <div data-role="content">
      <center> <h2> Student List of Exams</h2></center>
		<div id="x">
			<ul data-role="listview" data-inset="true">
                
             <?php
			 $student_id = $_GET['student_id'];
			 $_SESSION['student_id'] = $student_id;
			
$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/webservice/students_exam.php?student_id=".$student_id));

foreach($jsonObject as $exam)
{
	echo '<li> <a href="http://170.225.98.69/vt/exam_details.php?exam_id='.$exam->exam_id.'">'.$exam->exam_name.'</a></li>';
}
?>			 
				
					</ul>
					
					
		</div>
       </div>
    </div>
</body>
</html>