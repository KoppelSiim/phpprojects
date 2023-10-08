<?php
session_start();
require($_SERVER["DOCUMENT_ROOT"]."/../config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $event = $_POST["event"];
    $time = $_POST["time"];
   
    
    if (empty($event) || empty($time)) {
        header("Location: validation-error.php");
        exit();
    }
    try {
        $insert_schedule = $connect->prepare("INSERT INTO schedule (event, time) VALUES (?, TIME(?))");
        $insert_schedule->bind_param("ss", $event, $time);
        
        if ($insert_schedule->execute()) {
            // Insertion successful, redirect to index
            $_SESSION["schedule_success"] = true;
            header("Location: index.php");
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        //$_SESSION["validation_errors"] = true;
        // Handle duplicate email error gracefully
        header("Location: index.php");
        exit();
    }
}
?>
