<?php
header('Content-Type: text/html; charset=utf-8');
$dbc = mysqli_connect ('localhost','root','','projekt') 
        or die ('Error connecting to mySQl'.mysqli_connect_error());
mysqli_set_charset($dbc, "utf8");

?>
