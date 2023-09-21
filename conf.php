<?php
// config.php
require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
$server = "<DB>.SERVER";
$user = "<DB>.USER";
$db = "<DB>.DATABASE";
$pass ="<DB>.PASSWORD";
$connect=new mysqli($server, $user, $pass, $db);   
?>