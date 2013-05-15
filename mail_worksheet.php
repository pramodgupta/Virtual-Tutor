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

		$mid = $_GET['mid'];
		$eid = 0;
		$qid = 0;
		$sid = 0;
		$cid =  0;
		$comment= '';
		
			$jsonObject1 = json_decode(file_get_contents("http://170.225.98.69/vt/webservice/mail_details.php?&mid=".$mid));
			foreach($jsonObject1 as $clas2)
			{
				$eid = $clas2->exam_id;
				$qid = $clas2->question_id;
				$sid = $clas2->student_id;
				$cid =  $clas2->student_id;
				$comment = $clas2->comment;
				$tutor_comment = $clas2->tutor_comment;
			}
			
					
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

<label>Comment By Student:</label>
<?php echo $comment; ?>
<br>
<br>
<label>Comment By Tutor:</label>
<?php if($tutor_comment)
		{echo $tutor_comment;}
	else
		{echo '--';}
 ?>
<br>
<br>
<label>Add Comment:</label>
<form>
<textarea  name="comment" id="tutor_comment" ></textarea>
</form>

<a href="#" id="save" data-role="button" data-theme="b" />Send</a>
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
sendmail();

}

function sendmail()
{
var tutor_comment = $('#tutor_comment').val();

var mid = "<?php echo $mid;?>";
	$.ajax({
  type: "POST",
  url: "webservice/tutor_mail.php",
  data: {mid:mid,comment:tutor_comment}
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
setTimeout(function(){ createimage(); alert("Sent");},500);
});
</script>




</div>
</div>
</body>
</html>


