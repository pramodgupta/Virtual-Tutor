<?php require_once('header.php') ;?>
      <center> <h2> Student List</h2></center>
		<div id="x">
			<ul data-role="listview" data-autodividers="true" data-filter="true" data-inset="true">
                
             <?php
			 $class_id = $_GET['class_id'];  
			 
			 $_SESSION['class_id'] = $class_id;
			
			
$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/webservice/students.php?class_id=".$class_id));

foreach($jsonObject as $clas)
{
	echo '<li> <a href="http://170.225.98.69/vt/student_details.php?student_id='.$clas->student_id.'">'.$clas->student_name.'</a></li>';
}
?>			 
				
					</ul>
		</div>
      
	  <?php require_once('footer.php') ;?>