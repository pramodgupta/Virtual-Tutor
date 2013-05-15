

  <?php


  include('connection.php');
  include('header.php');
  if(isset($_POST['submit']))
  {
     $question = $_POST['question'];
		$question_type = $_POST['question_type'];
		$option1 = $_POST['option1'];
		$option2 = $_POST['option2'];
		$option3 = $_POST['option3'];
		$option4 = $_POST['option4'];
		$solution = $_POST['solution'];
		$exam_id = $_POST['exam_id'];
		
		$query = mysql_query("select max(question_id) from exam_question where exam_id=".$exam_id);
		$question_id = 0;
		while($res = mysql_fetch_array($query))
		{
			$question_id = $res[0];
		}
		
		$question_id++;
		
		
		
$q1 = mysql_query("insert into exam_question (exam_id, question_id, question, option1, option2, option3, option4, solution, question_type ) values(".$exam_id.",".$question_id.",'".$question."','".$option1."','".$option2."','".$option3."','".$option4."','".$solution."',".$question_type.")");

//$q1 = mysql_query("insert into exam_question (exam_id,question_id) values('".$exam_id."','".$question_id."')") or die(mysql_error());
if($q1)
{
?>

<script>
alert("Added Successfully");
</script>

<?php
}


  }
  
  
  ?>
  <style>
  .add_exam{
  list-style: none !important;
  }
  
  .options
  {
	display: none;
  }
  </style>
    
      <center> <h2> Add Exam</h2></center>
		
		<form id="add_exam" action="http://170.225.98.69/vt/admin/exam_question_add.php" method="POST" >
		<ul class="add_exam">
		
		<li>
		<label> Exam:</label>
		<select name="exam_id">
		<?php
		$query1 = mysql_query("select * from exam") or die(mysql_error());
		while($results = mysql_fetch_array($query1))
		{
			echo "<option value='".$results[0]."'>".$results[1]."</option>";
		}
		?>
		</select>
		</li>
		
		<li>
		<label> Question:</label>
		<textarea name="question" id="question"></textarea>
		</li>
		<li><label> Question Type:</label>
		<select id="question_type" name="question_type">
		<option value="1">Text</option>
		<option value="2">Multiple Choice</option>
		</select>
		</li>
		
		<li class="options"><label> Option 1:</label>
		<input class="option1" type="text" name="option1" />
		</li>
		
		<li class="options"><label> Option 2:</label>
		<input class="option2" type="text" name="option2" />
		</li>
		
		<li class="options"><label> Option 3:</label>
		<input class="option3" type="text" name="option3" />
		</li>
		
		<li class="options"><label> Option 4:</label>
		<input class="option4" type="text" name="option4" />
		</li>
		
		<li><label> Solution:</label>
		<input class="solution" type="text" name="solution" />
		
		</li>
		
		<li>
		<input type="submit" class="button" data-theme="b" name="submit" value="Add Question" />
		</li>
		</ul>
		</form>
<script>
	$('select#question_type').change(function(){
	
		var ques = $('#question_type').val();
		 if(ques == 2)
		{
	
			$('.options').css('display','block');
		}
			else
			{
			$('.options').css('display','none');
			}
	});
	
	</script>
       
    <?php include('../footer.php'); ?>