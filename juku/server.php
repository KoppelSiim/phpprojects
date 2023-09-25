<?php
    require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
    global $connect;
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
            echo "<h4>".htmlspecialchars($sisu)."</h4>";
        }
    ?>
    <h1>Ülesandeid</h1>
    <h4>Väljasta kassid</h4>
    <?php
        require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
        $req = $connect -> prepare("SELECT id, nimi, toon FROM kassid"); 
        $req -> bind_result($id, $nimi, $toon);
        $req -> execute();
        while($req ->fetch()){
            echo "<h2>".htmlspecialchars($nimi)."</h2>";
            echo "<h4>".htmlspecialchars($toon)."</h4>";
        }
    ?>
     <!-- Kasside lisamine
        $insert = $connect -> prepare("INSERT INTO kassid(nimi,toon) VAlUES('Musike','Helekuldne'), ('Kullakallike','Tumesinine');");
        if ($insert->execute()) {
            echo "New record created successfully";
        } else {
            echo "Unable to create record";
        } -->
    <h4>Kuva kassid toonide järjekorras</h4>
    <?php
        $cats = $connect -> prepare("SELECT id, nimi, toon FROM kassid ORDER BY toon ASC;");
        $cats -> bind_result($id, $nimi, $toon);
        $cats -> execute();
        while($cats->fetch()){
            echo "<h5>".htmlspecialchars($toon)."</h5>";
        }
    ?>

</body>
</html>