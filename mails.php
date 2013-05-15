<?php require_once('header.php') ;?>
      <center> <h2> Mails </h2></center>
		
			<ul data-role="listview" data-filter="true" data-inset="true">
             <?php
			 $tutor_id = $_SESSION['user_id'];
			
$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/webservice/mails.php?tutor_id=".$tutor_id));

foreach($jsonObject as $clas)
{
	if($clas->status == 0)
	{
		echo '<li> <a href="http://170.225.98.69/vt/mail_question.php?mid='.$clas->mail_id.'">'.$clas->student_name.'</a>';
	}
	else
	{
		echo '<li data-theme="b"> <a href="http://170.225.98.69/vt/mail_question.php?mid='.$clas->mail_id.'">'.$clas->student_name.'</a>';
	}
	echo '<p style="padding: 5px 10px;">Submitted On:'.$clas->date.'</p>';
	echo '</li>';
}
?>			 
		   
					</ul>
<?php require_once('footer.php') ;?>