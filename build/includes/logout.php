<?php
session_start();
unset($_SESSION["account_id"]);
//sending user back to the page they came from before logout
$origin = $_SERVER["HTTP_REFERER"];
//redirect user to origin
header("location: $origin");
?>