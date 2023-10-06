<?php
session_start();
require($_SERVER["DOCUMENT_ROOT"]."/../config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    
   
    if (empty($firstName) || empty($lastName) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: validation-error.php");
        exit();
    }
    
    $order = $connect->prepare("INSERT INTO user (first_name, last_name, email) VALUES (?, ?, ?)");
    $order->bind_param("sss", $firstName, $lastName, $email);

    if ($order->execute()) {
        // Insertion successful, redirect to index
        $_SESSION["registration_success"] = true;
        header("Location: index.php");
        exit();
    } 
}
?>
