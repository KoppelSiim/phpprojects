<?php

    require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
    global $connect;
    
    if(isSet($_REQUEST["update-drink"])){
        $sqlUpdateCups=$connect->prepare("UPDATE coffee_machine SET cups = cups - 1 WHERE id = ?");
        $sqlUpdateCups->bind_param('i', $_REQUEST['update-drink']);
        if ($sqlUpdateCups->execute()) {
            header("Location: $_SERVER[PHP_SELF]");
        }else {
            echo "Error: " . $sqlUpdateCups->error;
        }
        $connect->close();
        exit();
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