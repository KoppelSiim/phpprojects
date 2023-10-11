<?php
require($_SERVER["DOCUMENT_ROOT"]."/../config.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $package = $_POST['package'];
        if (empty($name) || empty($package)) {
            echo "Error: Name and Package fields cannot be empty.";
        }
        else {
            $cups = $package;
            $sqlInsertDrink = $connect ->prepare("INSERT into coffee_machine(name,package,cups) VALUES(?,?,?)");
            $sqlInsertDrink->bind_param('sii',$name,$package,$cups);
            if ($sqlInsertDrink->execute()) {
                header("Location: index.php"); 
                exit;
            } else {
            echo "Error: " . $sqlInsertDrink->error;
            }
        }
    }
?>