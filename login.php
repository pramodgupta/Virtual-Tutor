
<?php
if($_POST)
{
    session_destroy();
	$username = $_POST['user'];
	$password = $_POST['pass'];


	$jsonObject = json_decode(file_get_contents("http://170.225.98.69/vt/webservice/login.php?username=".$username."&password=".$password));

	if($jsonObject->result != 0)
	{
	session_start(); 
		$_SESSION['username'] = $username;
		$_SESSION['user_id'] = $jsonObject->result;
		
	
	header("location: http://170.225.98.69/vt/class.php");
			
	}
	else
	{
	
	}
	
	
	
}
?>



<!DOCTYPE html>
<html>
 <head>
	<!-- jQuery Assets/ -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.css" />
  <!---  <link rel="stylesheet" href="m-is.css" />--->
		<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
			<script src="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.js"></script>
    <!-- /jQuery Assets -->
     <!--Overriding Local CSS-->
 	<link href="m-is.css" type="text/css" rel="stylesheet">   
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<!-- This meta tag is required, else Mobile Safari attempts to scale this page -->
	<meta content="width=device-width, minimum-scale=1, maximum-scale=1" name="viewport">
	<title>Virtual Tutors</title>
 </head>
<body>

    
    <div id= "firstpage" data-role="page">
    	
       <!-- Header -->
<link rel="stylesheet" href="m-is.css"/>
<div data-role="header">
   <div id="univheader">
   <div id="logo"><a href="http://www.umkc.edu"><img src="images\logo.png" height="32px"></a></div>
   <div id="homeButton"><a href="index.php" rel="external" data-role="button" data-icon="home" data-iconpos="notext" class="ui-btn-right" data-theme="b">Home</a></div>
   </div> 
</div>
        
        <!-- Page Content -->
        <div class="ui-content" id="callAjaxPage" data-role="content" style="margin-bottom: 20px;">
        	<center>
            <h2>Virtual Tutor</h2>
            </center>
			
			<center>
            <h3>Login</h3>
            </center> 
       
            <form data-ajax="false" id="callAjaxForm" action="class.php" method="POST">
                <div data-role="fieldcontain">
				<center><label>Username:</label>
                    <input type="text" name="user" id="devname" hidden="true"/>
					<br/>
					<br/>
				<label>Password:</label>
					<input type="password" name="pass" id="pass"  hidden="true"/>
					<br>
					<br>
					<button data-theme="b" id="submit" type="submit">Login</button>
                </center></div>
            </form>
       
	   
		
		<div id="error"></div>
   
        </div> 
       <!-- Footer -->
<div style="position:absolute; bottom:0px; width: 100%;">
<div id="univfooter" class="ui-bar-b" data-position="fixed">
	<center>
    	<div id="footer-text"> University of Missouri-Kansas City - <a href="copyright.cfm" data-transition="slide">Copyright</a>
           		         </div>
    </center>
</div>
</div>
    
    
    
</body>
</html>

