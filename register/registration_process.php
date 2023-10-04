<?php
require($_SERVER["DOCUMENT_ROOT"]."/../config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    
    // todos validation

    $order = $connect->prepare("INSERT INTO user (first_name, last_name, email) VALUES (?, ?, ?)");
    $order->bind_param("sss", $firstName, $lastName, $email);

    if ($order->execute()) {
        // Insertion successful, redirect to index, todos maybe redirect to success page
        header("Location: index.php");
        exit();
    } else {
        // Insertion failed, handle the error, todos insert new error page
        header("Location: error404.php");
        exit();
    }
}
?>
