<?php
require($_SERVER["DOCUMENT_ROOT"]."/../config.php");
global $connect;

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