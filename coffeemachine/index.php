<?php

    require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
    global $connect;

    if(isSet($_REQUEST["update-drink"])) {
        $sqlUpdateCups=$connect->prepare("UPDATE coffee_machine SET cups = cups - 1 WHERE id = ?");
        $sqlUpdateCups->bind_param("i", $_REQUEST["update-drink"]);
        if ($sqlUpdateCups->execute()) {
            header("Location: $_SERVER[PHP_SELF]");
        }else {
            echo "Error: " . $sqlUpdateCups->error;
        }
        $connect->close();
        exit();
    }
    if (isSet($_REQUEST["add-package"])) {
        $sqlAddPackage=$connect->prepare("UPDATE coffee_machine SET cups = cups + package WHERE id = ?");
        $sqlAddPackage->bind_param("i", $_REQUEST["add-package"]);
        if($sqlAddPackage->execute()){
            header("Location: $_SERVER[PHP_SELF]");
        } else {
            echo "Error: ". $sqlAddPackage->error;
        }
        $connect->close();
        exit();
    }
    if(isSet($_REQUEST["delete-drink"])) {
        $sqlDeleteDrink = $connect->prepare("DELETE FROM coffee_machine WHERE id=?");
        $sqlDeleteDrink->bind_param("i", $_REQUEST["delete-drink"]);
        if($sqlDeleteDrink->execute()) {
            header("Location: $_SERVER[PHP_SELF]");
        } else {
            echo "Error: ". $sqlDeleteDrink->error;
        }

    }

    require("header.php");
    
    if(isset($_GET["page"])) {
        $openPage = $_GET["page"].".php";
        if (file_exists($openPage)) {
            require($openPage);
        } else {
            require("error404.php");
        }
    } 
    
    require("footer.php");
?>