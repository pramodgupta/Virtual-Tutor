<?php 
if ( isset($_POST["image"]) && !empty($_POST["image"]) ) {    
    // Init dataURL variable
    $dataURL = $_POST["image"];  
    // Extract base64 data (Get rid from the MIME & Data Type)
    $parts = explode(',', $dataURL);  
    $data = $parts[1];  
    // Decode Base64 data
    $data = base64_decode($data);  
    // Save data as an image
	$cid = $_POST['cid'];
	$qid = $_POST['qid'];
	$eid = $_POST['eid'];
	$sid = $_POST['sid'];

	$directory = 'images/class_'.$cid.'/student_'.$sid.'/exam_'.$eid;
	$directory_class="images/class_".$cid;
	$directory_student="images/class_".$cid.'/student_'.$sid;
	$directory_exam="images/class_".$cid.'/student_'.$sid.'/exam_'.$eid;
	
		if(!is_dir($directory_class))
			mkdir($directory_class);
		
		if(!is_dir($directory_student))
			mkdir($directory_student);
			
		if(!is_dir($directory_exam))
			mkdir($directory_exam);
			
	$name = $directory.'/question_'.$qid.'.png';
    $fp = fopen($name, 'w');  
    fwrite($fp, $data);  
    fclose($fp); 
}

?>