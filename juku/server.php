<?php
    require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
    global $connect;
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
    <ol>
        <li><a href="?page=teated">Teated</a></li>
        <li><a href="?page=kassid">Kassid</a></li>
        <li><a href="?page=koerad">Koerad</a></li>
    </ol>
    <?php
        if (isset($_GET['page']) && $_GET['page'] == 'teated') {
            echo"<h1>Teadete loetelu</h1>";
            $req = $connect -> prepare("SELECT id, pealkiri, sisu FROM lehed");
            $req -> bind_result($id, $pealkiri, $sisu);
            $req -> execute();
        
            while($req ->fetch()){
                echo "<h2>".htmlspecialchars($pealkiri)."</h2>";
                echo "<h4>".htmlspecialchars($sisu)."</h4>";
            }
        }
    ?>
    <?php
        if (isset($_GET['page']) && $_GET['page'] == 'kassid') {
            echo"<h1>Kassid</h1>";
            $cats = $connect -> prepare("SELECT id, nimi, toon FROM kassid");
            $cats -> bind_result($id, $nimi, $toon);
            $cats -> execute();
            while($cats->fetch()){
                echo "<h4 style ='color:$toon;'>".htmlspecialchars($toon)."</h4>";
            }
        }
    ?>
    <?php

        if (isset($_GET['page']) && $_GET['page'] == 'koerad') {
            echo"<h1>Koerad</h1>";
            $dogs = $connect -> prepare("SELECT id, nimi, kirjeldus, pildilink FROM koerad");
            $dogs -> bind_result($id, $nimi, $kirjeldus, $pildilink);
            $dogs ->execute();
            while($dogs -> fetch()){
                echo"<li>$nimi</li>";
            }
        }


    ?>

</body>
</html>