<!doctype html>
<html>
<head>
   <title>Virtual Tutor</title>
   <meta http-equiv=content-type content=text/html;charset=utf-8>

   <meta name=viewport content=width=device-width>
   <meta name=viewport content=initial-scale=1.0>
   <meta name=viewport content=user-scalable=no>

   <meta name=apple-mobile-web-app-capable content=yes>
   <meta name=apple-mobile-web-app-status-bar-style content=black>

   <link rel=apple-touch-icon href=icon.png>
   <link rel=apple-touch-startup-image href=startup.png>
   <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />

   <style>
       .message {
           padding: 5px 5px 5px 5px;
       }
       .username {
           font-weight: strong;
           color: #0f0;
       }
       .msgContainerDiv {
           overflow-y: scroll;
           height: 250px;
       }
   </style>
</head>
<body>

   <div data-role="page" id="loginPage" data-role="page" >
       <div data-role="header">
           <h1>Dashboard Chat Room</h1>
       </div>

       <div data-role="content">
           <div data-role="fieldcontain">
		   <center><p style="font-weight: bold; margin-bottom: 60px;">Enter into the Chat Room to chat with Tutors and Other students</p></center>
		   
               <label for="chatNameText"><strong>Chat Name:</strong></label>
               <input type="text" name="chatNameText" id="chatNameText" value=""  />
			   <br><br><Br>
               <button id="chatNameButton">Enter Chat Room</button>
           </div>
       </div>

     
   </div>

   <div data-role="page" id="chatPage" data-role="page" >

       <div data-role="header">
           <h1>Virtual Tutor</h1>
       </div>

       <div data-role="content">
       <div id="incomingMessages" name="incomingMessages" class="msgContainerDiv" ></div>
       <label for="messageText"><strong>Message:</strong></label>
       <textarea id="messageText"></textarea>

       <fieldset class="ui-grid-a">
           <div class="ui-block-a"><a href="#loginPage" id="goBackButton" data-role="button">Go Back</a></div>
           <div class="ui-block-b"><button data-theme="b" id="chatSendButton" name="chatSendButton">Send</input>
       </fieldset>
       </div>

      
   </div>


   <div id=pubnub pub-key=demo sub-key=demo></div>
   <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
   <script src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
   <script src="../js/pubnub.min.js"></script>
   <script>$(document).ready(function(){

       var chatName = ""
       ,   channel  = "mobile-chat";

       PUBNUB.subscribe({
           channel  : channel,
           callback : function(message) {
               $("#incomingMessages").append(
                   "<div class='message'><span class='username'>" +
                   (message.chatName || 'Anonymous') +
                   "</span> : " +
                   (message.text || ' ') +
                   "</div>"
               );
               $("#incomingMessages").scrollTop(
                   $("#incomingMessages")[0].scrollHeight
               );
           }
       });

       $("#chatNameButton").click(function(){
           chatName = $("#chatNameText").val();
           if(chatName.length <= 0) chatName = "unknown";
           $(location).attr('href',"#chatPage");
       });

       $("#messageText").bind( 'keydown', function(e) {
           if ((e.keyCode || e.charCode) !== 13) return true;
           $("#chatSendButton").click();
           return false;
       });

       $("#chatSendButton").click(function(){
           PUBNUB.publish({
               channel : channel,
               message : {
                    chatName : chatName,
                    text     : $("#messageText").val()
                }
           });
           $("#messageText").val("");
       });

   });</script>
   <?php include('footer.php') ; ?>
