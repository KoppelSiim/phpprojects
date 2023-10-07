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

/*if(isSet($_REQUEST["administrator.php"])){
    $order = $connect->prepare("SELECT id, first_name, last_name, email FROM user");
    $order->bind_result($id, $first_name, $last_name, $email);
    $order->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $connect->close();
    exit();
}/*
if(isSet($_REQUEST["kustutusid"])){
    $kask=$connect->prepare("DELETE FROM lehed WHERE id=?");
    $kask->bind_param("i", $_REQUEST["kustutusid"]);
    $kask->execute();
}
*/
require("header.php");
if (isset($_SESSION["registration_success"]) && $_SESSION["registration_success"] === true) {
    echo '<p style="color: green; font-size: 20px; padding:5px; margin-bottom: 20px;">Olete peole registreeritud!</p>';
    // Unset the session variable to prevent repeated display
    unset($_SESSION["registration_success"]);
}
if (isset($_SESSION["delete_success"]) && $_SESSION["delete_success"] === true) {
    echo '<p style="color: red; font-size: 20px; padding:5px; margin-bottom: 20px;">Kirje kustutatud</p>';
    // Unset the session variable to prevent repeated display
    unset($_SESSION["delete_success"]);
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