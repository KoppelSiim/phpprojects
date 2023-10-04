<?php
require($_SERVER["DOCUMENT_ROOT"]."/../config.php");
global $connect;
session_start(); // Start the session 

/*
$order = $connect->prepare("INSERT INTO user (first_name, last_name, email) VALUES(?,?,?)");
$order->bind_param("sss", $_REQUEST["firstName"], $_REQUEST["lastName"], $_REQUEST["email"]);
$order->execute();
header("Location: $_SERVER[PHP_SELF]");
$connect->close();
exit();
*/


/*if(isSet($_REQUEST["uusleht"])){
    $kask=$connect->prepare("INSERT INTO lehed (pealkiri, sisu) VALUES (?, ?)");
    $kask->bind_param("ss", $_REQUEST["pealkiri"], $_REQUEST["sisu"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit();
}
if(isSet($_REQUEST["kustutusid"])){
    $kask=$connect->prepare("DELETE FROM lehed WHERE id=?");
    $kask->bind_param("i", $_REQUEST["kustutusid"]);
    $kask->execute();
}
*/
require("header.php");
if (isset($_SESSION["registration_success"]) && $_SESSION["registration_success"] === true) {
    echo '<p style="color: green; font-size: 20px;">Registration successful!</p>';
    // Unset the session variable to prevent repeated display
    unset($_SESSION["registration_success"]);
}

if(isset($_GET["page"])){
    $openPage = $_GET["page"].".php";
    if (file_exists($openPage)) {
        require($openPage);
    } else {
        require("error404.php");
    }
    
} else {
    require("default.php");
}

require("footer.php");