<?php session_start(); 
error_reporting(0);
if(!isset($_SESSION['student_id']))
{
header("Location: http://170.225.98.69/vt/student/login.php");
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
 	<link href="../m-is.css" type="text/css" rel="stylesheet">   
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<!-- This meta tag is required, else Mobile Safari attempts to scale this page -->
	 <meta content="width=device-width, minimum-scale=1, maximum-scale=1" name="viewport"> 
	<title>Virtual Tutors</title>
 </head>
<body>
    
  
    <!-- call ajax page -->
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
            </center>