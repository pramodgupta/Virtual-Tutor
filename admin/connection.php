<?php
$conn = mysql_connect('localhost','root','') or die(mysql_error());

//Selecting the Database
$db = mysql_select_db('kdm') or die(mysql_error());
?>