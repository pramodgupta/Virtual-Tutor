<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
    <title>Virtual Tutor</title>
     <!-- jQuery Assets/ -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.css" />
  <!---  <link rel="stylesheet" href="m-is.css" />--->
		<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
			<script src="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.js"></script>
    <!-- /jQuery Assets -->
     <!--Overriding Local CSS-->
 	<link href="../m-is.css" type="text/css" rel="stylesheet">   
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	    <meta content="width=device-width, minimum-scale=1, maximum-scale=1" name="viewport"> 
	 <style>
	 input{margin-left: 10%;}
	 </style>
	
</head>
<body>

<?php
if($_POST)
{

	$username = $_POST['user'];
	$password = $_POST['pass'];


	$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/student/webservice/login.php?username=".$username."&password=".$password));

	if($jsonObject->result != 0)
	{
	session_start(); 
		$_SESSION['student_name'] = $username;
		$_SESSION['student_id'] = $jsonObject->result;
		
	
	header("location: class.php");
			
	}
	else
	{
	
	}
	
	
	
}
?>
   <div id= "firstpage" data-role="page">
    	
       <!-- Header -->
<link rel="stylesheet" href="m-is.css"/>
<div data-role="header">
   <div id="univheader">
   <div id="logo"><a href="http://www.umkc.edu"><img src="images\logo.png" height="32px"></a></div>
   <div id="homeButton"><a href="class.php" rel="external" data-role="button" data-icon="home" data-iconpos="notext" class="ui-btn-right" data-theme="b">Home</a></div>
   </div> 
</div>
        
        <!-- Page Content -->
        <div class="ui-content" id="callAjaxPage" data-role="content" style="margin-bottom: 20px;">
		
		<center>
            <h2>Virtual Tutor</h2>
            
			<h3>Login</h3></center>
            <form id="callAjaxForm" action="" method="POST">
                <div data-role="fieldcontain">
				<label>Username:</label>
                    <input type="text" name="user" id="devname" value="username"  hidden="true"/>
					<br style="clear:both;" />
					<br>
				<label>Password</label>
					<input type="password" name="pass" id="pass"  hidden="true"/>
					<br>
					<br>
					<button data-theme="b" id="submit" type="submit">Login</button>
                </div>
            </form>
        </div>
		
		<div id="error"></div>
  
       
    </div>
</body>
</html>