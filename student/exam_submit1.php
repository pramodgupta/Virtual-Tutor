<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
    <title>Virtual Tutor</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.js"></script>
	  
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
</head>
<body>

<?php

	if(isset($_POST['submit']))
	{
	
		$exam = $_POST['exam'];
		
		$student_id = $_POST['student_id'];
		$question_id = $_POST['question_id'];
		$answer = $_POST['answer'];
		$answering_time = $_POST['answering_time'];
	
		$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/student/webservice/exam_submit.php?exam_id=".$exam."&student_id=".$student_id."&question_id=".$question_id."&answer=".$answer."&answering_time=".$answering_time));
		
	
	}



?>
    
  <?php
		
			
			
			
			
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
				$jsonObject1 = json_decode(file_get_contents("http://170.225.98.69/vt/student/webservice/exam_details_count.php?&exam_id=".$exam_id));
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
    <!-- call ajax page -->
    <div data-role="page" id="callAjaxPage">
        <div data-role="header">
            <h1>Exam Details</h1>
			
        </div>
   <div data-role="content">
   
   
   <?php
	
$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/webservice/exam_details.php?&exam_id=".$exam_id."&qid=".$qid));
	 
   
 foreach($jsonObject as $clas)
{
	$question_id = $clas->question_id;
	$question = $clas->question;
	$question_type = $clas->question_type;
	$option1 = $clas->option1;
	$option2 = $clas->option2;
	$option3 = $clas->option3;
	$option4 = $clas->option4;
	$option4 = $clas->option4;

}
  ?>	 
      <center> <h2> Student Details</h2></center>
		<div id="x">
		<h2><?php echo $question_id.") ".$question."?";?></h2>
	
	<?php
	$location = '';
if( $_SESSION['questions_count_new'] != 0)
{
$qid_new = $qid + 1;
}
else
{
$qid_new = $qid;
	
}
$location = "http://170.225.98.69/vt/student/exam_submit1.php?exam_id=".$exam_id."&qid=".$qid_new; 


	?>
	
		<form action="<?php echo $location ; ?>" method="POST">
		<legend> Solution: </legend>
		<?php
		if($question_type ==1 )
		{
			echo '<textarea id="answer" name="answer"></textarea>';
		}
		else
		{
			for($i=1; $i<=4; $i++)
			{
				$option = 'option'.$i;
				echo '<input type="radio" name="answer" id="'.$option.'" value="'.$i.'" />';
				echo '<label for="'.$option.'">'.$clas->$option.'</label>';
			}
		}
		
		?>
		<input type="hidden" name="exam" value="<?php echo $exam_id; ?>" />
		<input type="hidden" name="student_id" value="<?php echo $student_id; ?>" />
		<input type="hidden" name="question_id" value="<?php echo $question_id; ?>" />
		<input type="hidden" name="answering_time" value="<?php echo $answering_time; ?>" />
				
			
		
 
		       
<a href="#popupBasic" data-rel="popup">Worksheet</a>

<input type="submit" name="submit" value="Save & Next" />

</form>
<div data-role="popup" data-position-to="window"  data-overlay-theme="a" id="popupBasic">
	<iframe <?php echo 'src="http://170.225.98.69/vt/worksheet.php?cid='.$class_id.'&sid='.$student_id.'&eid='.$exam_id.'&qid='.$qid.'"'; ?> width="800px" height="600px" seamless></iframe>
</div>


</div>
	   
    </div>
	
	
</body>
</html>