<?php
    require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
    $connect=new mysqli($server, $user, $pass, $db);      
    $req = $connect -> prepare("SELECT id, pealkiri, sisu FROM lehed");
    $req -> bind_result($id, $pealkiri, $sisu);
    $req -> execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Teadete loetelu</h1>
    
    <?php

       while($req ->fetch()){
            echo "<h2>".htmlspecialchars($pealkiri)."</h2>";
        }
    ?>

</body>
</html>