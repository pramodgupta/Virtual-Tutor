
</div>
<div id="footer" data-role="footer" data-position="fixed">		
	<div data-role="navbar">
		<ul>
			<li><a href="http://170.225.98.69/vt/class.php" data-icon="grid"  data-transition="slide"  >Classes</a></li>
			<li><a href="#adminPanel" data-rel="popup" data-icon="plus"  data-transition="pop" data-position-to="window" >Admin Actions</a></li>
			<li><a target="_blank" href="http://170.225.98.69/vt/dashboard_chat.php"  data-icon="grid"   >Chat Room</a></li>
			<li><a href="http://170.225.98.69/vt/mails.php"  data-icon="grid"   >Mails
			<?php
			$tutor_id = 0;
			$tutor_id = $_SESSION['user_id'];
			$jsonObject4 = json_decode(file_get_contents("http://170.225.98.69/vt/webservice/mail_count.php?tutor_id=".$tutor_id));
			
			foreach($jsonObject4 as $counts)
			{
					$counter = $counts->count;
			}
			if($counter != 0)
			{
				echo "(".$counter.")";
			}
			?>
			
			</a></li>
			<li><a href="http://170.225.98.69/vt/login.php"  data-icon="gear" >Signout</a></li>
		</ul>
	</div><!-- /navbar -->
</div>

<style>
#popupPanel-popup {
    right: 0 !important;
    left: auto !important;
}
#popupPanel {
    width: 200px;
	height: 800px;
    border: 1px solid #000;
    border-right: none;
    background: rgba(0,0,0,.5);
    margin: -1px 0;
}
#popupPanel .ui-btn {
    margin: 2em 15px;
}
</style>



			
<div data-role="popup" id="popupPanel" data-corners="false" data-theme="none" data-shadow="false" data-tolerance="0,0">

      
		<div id="loggedusers">
		<center><h3> Online Users </h3>
			<ul data-inset="true">
             <?php
			
			
$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/webservice/online_users.php"));

if($jsonObject)
{
	foreach($jsonObject as $clas)
	{
		echo '<li> <a href="http://170.225.98.69/vt/student_details.php?student_id='.$clas->student_id.'">'.$clas->student_name.'</a></li>';
	}
}
else
{
	
	echo ' No Users';
}
?>			 
		   
					</ul>
					</center>
</div>
	 
</div>


<div  id="adminPanel" data-role="popup" data-position-to="window"  data-overlay-theme="a">
<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
  <ul data-role="listview" style="min-width: 275px;">
	<li style="border-radius: 10px;"><a href="http://170.225.98.69/vt/admin/exam_add.php?class=">Add Exam</a>	</li>
	<li style="border-radius: 10px;"><a href="http://170.225.98.69/vt/admin/exam_question_add.php?class=">Add Question</a>	</li>
	
  </ul>
	 
</div>

	   
    </div>
	
	<?php include('mail_alert.php'); ?>
	
</body>
</html>