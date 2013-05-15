<?php include('header.php') ; ?>
      <center> <h2> Classes List</h2></center>
		
			<ul data-role="listview" data-inset="true">
             <?php
			 $student_name = $_SESSION['student_name'];
			 
			
$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/student/webservice/class.php?student_name=".$student_name));

foreach($jsonObject as $clas)
{
	echo '<li> <a data-transition="slide" href="http://170.225.98.69/vt/student/student_exam.php?class_id='.$clas->class_id.'">'.$clas->class.'</a></li>';
}
?>			 
		   
					</ul>

       
  <?php include('footer.php') ; ?>