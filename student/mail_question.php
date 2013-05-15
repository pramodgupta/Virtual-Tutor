<?php include('header.php') ; ?>
   
     <style>
	  .ui-field-contain .ui-controlgroup-controls
	  {
	  width: 100%;
	  }
	  .ui-disabled
	  {
		opacity: 1 !important;
	  }
	  </style>
  <?php
		
			$mail_id = $_GET['mid'];
			$exam_id = 0;
			$qid = 0;
			$student_id = 0;
			$class_id =  0;
			
		$jsonObject1 = json_decode(file_get_contents("http://170.225.98.69/vt/student/webservice/mail_details.php?&mid=".$mail_id));
			foreach($jsonObject1 as $clas2)
			{
				$exam_id = $clas2->exam_id;
				$qid = $clas2->question_id;
				$student_id = $clas2->student_id;
				$class_id =  $clas2->student_id;
			}
			
			
						
  
  ?>
   
   
   <?php
						 
			
			
$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/student/webservice/exam_details.php?&exam_id=".$exam_id."&qid=".$qid));

?>

		 
   
   
      <center> <h2> Student Details</h2></center>
		<div id="x">
			
			<?php
foreach($jsonObject as $clas)
{
	echo '<h2>'.$clas->question_id.')'.$clas->question.'</h2>';
	
	echo 'solution:';
	if($clas->question_type == 1)
	{
			if( $clas->answer)
			{
				echo $clas->answer;
			}
	}
	else
	{
	
	?>
		 <div data-role="fieldcontain">
 <fieldset data-role="controlgroup">
 <?php
 
 for($i = 1; $i <=4; $i++)
 {
 
 if($i == $clas->answer)
	echo '<input disabled checked type="checkbox" name="checkbox" id="checkbox_'.$i.'"  />';
	else
	echo '<input disabled style="opacity:1" type="checkbox" name="checkbox" id="checkbox_'.$i.'"  />';
	
	$option = 'option'.$i;
	echo '<label for="checkbox_'.$i.'" class="erg1" >'.$clas->$option.'</label>';
 } ?>
 
 </fieldset>
 </div>
 
	<?php
	
	}
	
	
	
}
?>	
			
			
				
			
		
 
		</div>
       
<a href="#popupBasic" data-role="button"  data-theme="b" data-rel="popup">Worksheet</a>

<div data-role="popup" data-position-to="window"  data-overlay-theme="a" id="popupBasic">
	<iframe <?php echo 'src="http://170.225.98.69/vt/mail_worksheet.php?mid='.$mail_id.'"'; ?> width="800px" height="600px" seamless></iframe>
</div>

<?php include('footer.php') ;?>