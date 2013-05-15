
  <?php


  include('connection.php');
  include('header.php');
  $user_id = $_SESSION['user_id'];
  if(isset($_POST['submit']))
  {
     $exam_name = $_POST['exam_name'];
		$user = $_POST['user'];
		$class_id = $_POST['class_id'];
		
	
		
		
		$date = date('Y-m-d');
$q1 = mysql_query("insert into exam (exam_name, class_id,date ) values('".$exam_name."',".$class_id.",'".$date."')");

//$q1 = mysql_query("insert into exam_question (exam_id,question_id) values('".$exam_id."','".$question_id."')") or die(mysql_error());
if($q1)
{
?>

<script>
alert("Added Successfully");
</script>
<style>
form ul
{

}
</style>
<?php
}


  }
  
  
  ?>
  
    <!-- call ajax page -->
      <center> <h2> Add Exam</h2></center>
		
		<form id="add_exam" action="http://170.225.98.69/vt/admin/exam_add.php" method="POST" >
		<ul style="list-style: none !important;">
		
		<li><label for="exam_name"> Exam Name:</label>
		<input class="solution" id="exam_name" type="text" name="exam_name" />
			<input type="hidden" value="<?php echo $user_id;?>" name="user" />
		
		</li>
		<li>
		<label> Class:</label>
		<select name="class_id">
		<?php
		$user_id = 1;
	//	$query1 = mysql_query("select a.id, a.name from class_details a, class b where b.class = a.id and b.user_id =".$user_id."')") or die(mysql_error());
	$query1 = mysql_query("select a.id, a.name from class_details a, class b where b.class = a.id and b.user_id =".$user_id) or die(mysql_error());
		while($results = mysql_fetch_array($query1))
		{
			echo "<option value='".$results[0]."'>".$results[1]."</option>";
		}
		?>
		</select>
		</li>
		
		
		
				
		
		
		<li>
		<input type="submit" class="button" name="submit" data-theme="b" value="Add Exam" />
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