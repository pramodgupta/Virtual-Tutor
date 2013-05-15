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
 	 <script src="js/sketch.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<!-- This meta tag is required, else Mobile Safari attempts to scale this page -->
	 <meta content="width=device-width, minimum-scale=1, maximum-scale=1" name="viewport"> 
	<title>Virtual Tutors</title>
 </head>
<body>

<?php

			$sid = $_GET['sid'];
			$cid =   $_GET['cid'];
			$eid = $_GET['eid'];
			$qid = $_GET['qid'];
			//$img = 'images/class_'.$class_id.'/student_'.$student_id.'/exam_'.$exam_id.'/question_'.$qid.'.png';
			$image_src = 'images/class_'.$cid.'/student_'.$sid.'/exam_'.$eid.'/question_'.$qid.'.png';;
			if(!file_exists($image_src))
			{
				echo $image_src;
				$image_src = 'images/default.png';
			}
			
?>

  <div data-role="page" id="callAjaxPage">
        <div data-role="header">
            <h1>Worksheet</h1>
        </div>
   <div data-role="content">

<p>Edit the worksheet:</p>


<canvas id="myCanvas" width="700" height="400" style="border: 1px solid;background: url('<?php echo $image_src; ?>') no-repeat ;">
<script type="text/javascript">
  $(function() {
    $('#myCanvas').sketch({defaultColor: "#ff0"});
  });
</script>
Your browser does not support the HTML5 canvas tag.</canvas>


<br>

<a href="#" id="save" />Save the Worksheet</a>


<script>
function createimage(){
var canvasData = myCanvas.toDataURL();
var cid ='<?php echo $cid ;?>';
var qid ='<?php echo $qid ;?>';
var sid ='<?php echo $sid ;?>';
var eid ='<?php echo $eid ;?>';

$.ajax({
  type: "POST",
  url: "canvas_image_create.php",
  data: {image: canvasData,cid:cid,qid:qid,sid:sid,eid:eid}
}).done(function( respond ) {
 //alert(respond);
});
}
</script>
<script>
 $('#save').click(function(){

 var con2 = document.getElementById('myCanvas');
var context = con2.getContext("2d");

var img = new Image();
img.onload = function () {
    context.drawImage(img, 0, 0);
}
img.src = "<?php echo $image_src; ?>";


context.drawImage(con2,0,0);
setTimeout(function(){ createimage(); alert("saved");},500);
});
</script>




</div>
</div>
</body>
</html>

