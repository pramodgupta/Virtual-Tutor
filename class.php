

<?php require_once('header.php') ;


if($_POST)
{
    
	$username = $_POST['user'];
	$password = $_POST['pass'];


	$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/webservice/login.php?username=".$username."&password=".$password));

	if($jsonObject->result != 0)
	{
	 
		$_SESSION['username'] = $username;
		$_SESSION['user_id'] = $jsonObject->result;
		
	
	
			
	}
	else
	{
	header("location: http://170.225.98.69/vt/login.php");
	}
	
	
	
}
?>
  
      <center> <h2> Classes List</h2></center>
		
			<ul data-role="listview" data-inset="true">
             <?php
			 $user_id = $_SESSION['user_id'];
			 
			 
			
$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/webservice/class.php?user_id=".$user_id));

foreach($jsonObject as $clas)
{
	echo '<li> <a href="http://170.225.98.69/vt/student_class.php?class_id='.$clas->class_id.'">'.$clas->class.'</a></li>';
}
?>			 
		   
					</ul>

 <?php require_once('footer.php') ;?> 