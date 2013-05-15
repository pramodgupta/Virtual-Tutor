<?php require_once('header.php') ;?>
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
		
			$exam_id = $_GET['exam_id'];
			$_SESSION['exam_id'] = $exam_id;
			
			
			$student_id = $_SESSION['student_id'];
			$class_id =   $_SESSION['class_id'];
			$exam_id = $_GET['exam_id'];
			$qid = 1;
			if(isset($_GET['qid']))
			{
				$qid = $_GET['qid'];
			}
			else
			{
				$jsonObject1 = json_decode(file_get_contents("http://170.225.98.69/vt/webservice/exam_details_count.php?&exam_id=".$exam_id));
				foreach($jsonObject1 as $clas1)
				{
					$_SESSION['questions_count'] =  $clas1->count;
				}
			}
			
			if(!isset($_SESSION['questions_count_new']))
			{
			
				$_SESSION['questions_count_new'] = $_SESSION['questions_count'];
			}
			
			 $_SESSION['questions_count_new']-- ;
  
  ?>
   
   <?php
						 
			
			
$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/webservice/exam_details.php?&exam_id=".$exam_id."&qid=".$qid));
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
				echo 'here';
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
		 <fieldset class="ui-grid-a">
  <div class="ui-block-a">
       
<a href="#popupBasic" data-theme="c" data-role="button" data-rel="popup">Worksheet</a>
</div>
<div class="ui-block-b">
<?php

if( $_SESSION['questions_count_new'] != 0)
{
$qid_new = $qid + 1;
	echo '<a data-theme="b" data-role="button" href="http://170.225.98.69/vt/student/exam_details.php?exam_id='.$exam_id.'&qid='.$qid_new.'">Next Question</a>';
}

?>
</div>
</fieldset>
<div data-role="popup" data-position-to="window"  data-overlay-theme="a" id="popupBasic">
	<iframe <?php echo 'src="http://170.225.98.69/vt/worksheet.php?cid='.$class_id.'&sid='.$student_id.'&eid='.$exam_id.'&qid='.$qid.'"'; ?> width="800px" height="600px" seamless></iframe>
</div>


<?php include('footer.php') ;?>