<?php
// start a session
session_start();
 $as='100';
// initialize session variables
$_SESSION['logged_in_user_id'] = $as;
$_SESSION['logged_in_user_name'] = 'Tutsplus';

?>