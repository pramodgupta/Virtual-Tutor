
		<div id="loggedusers">
			<ul data-role="listview" data-inset="true">
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
	echo '<li> No Users</li>';
}
?>			 
		   
					</ul>
</div>
  