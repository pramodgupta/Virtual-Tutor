
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 <script>
 
 $('document').ready(function(){

var tutor_id = 1;
 mail_checker();
 function mail_checker(){

 $.ajax({
 url:'webservice/mail_check.php',
 type: 'POST',
 data: 'tutor_id='+tutor_id,
 success: function(response){
 if(response != 0)
 {
	alert("You have a new mail");
 }
 },
 complete: function(){

 }
 
 });
 
 setInterval(function(){mail_checker()},60000);
 }
 });
 </script>
