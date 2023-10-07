<?php
require($_SERVER["DOCUMENT_ROOT"]."/../config.php");
global $connect;

session_start(); // Start the session 

require("header.php");
if (isset($_SESSION["registration_success"]) && $_SESSION["registration_success"] === true) {
    echo '<p style="color: green; font-size: 20px; padding:5px; margin-bottom: 20px;">Olete peole registreeritud!</p>';
    // Unset the session variable to prevent repeated display
    unset($_SESSION["registration_success"]);
}
if (isset($_SESSION["schedule_success"]) && $_SESSION["schedule_success"] === true) {
    echo '<p style="color: green; font-size: 20px; padding:5px; margin-bottom: 20px;">Üritus on lisatud!</p>';
    // Unset the session variable to prevent repeated display
    unset($_SESSION["schedule_success"]);
}
if (isset($_SESSION["delete_success"]) && $_SESSION["delete_success"] === true) {
    echo '<p style="color: red; font-size: 20px; padding:5px; margin-bottom: 20px;">Kirje kustutatud</p>';
    // Unset the session variable to prevent repeated display
    unset($_SESSION["delete_success"]);
}
if (isset($_SESSION["validation_errors"]) && $_SESSION["validation_errors"] === true) {
    // Include validation-error.php here
    require("validation-error.php");
    // Unset the session variable to prevent repeated display
    unset($_SESSION["validation_errors"]);
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