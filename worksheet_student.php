<!DOCTYPE html>
<html>
<head>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
   <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.js"></script>
 <script src="js/sketch.js"></script>
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
<form action="http://170.225.98.69/vt/webservice/worksheet_mail.php" method="POST">


<label>Comment</label>
		<textarea name="comment"></textarea>
		<input type="hidden" id="exam_id" name="exam_id" value="<?php echo $eid; ?>" />
		<input type="hidden" id="student_id" name="student_id" value="<?php echo $sid; ?>" />
		<input type="hidden" id="question_id" name="question_id" value="<?php echo $qid; ?>" />
		<input type="hidden" id="class_id" name="class_id" value="<?php echo $cid; ?>" />
				
<a href="#" class="save" />Save the Worksheet</a>
<input type="submit" id="ask" value="Ask a Tutor" name="submit" />
</form>




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
 $('.save').click(function(){

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

