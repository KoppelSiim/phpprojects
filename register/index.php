<?php
require("header.php");

if(isset($_GET("page"))){
    require($_GET["page"]).".php";
    }
    else{
        require("default.php");
    }
require("footer.php");

?>