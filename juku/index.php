<?php
    require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
    global $connect;

    if(isSet($_REQUEST["uusleht"])){
        $kask=$connect->prepare("INSERT INTO koerad (nimi, pildilink, kirjeldus) VALUES (?, ?, ?)");
        $kask->bind_param("sss", $_REQUEST["nimi"], $_REQUEST["pildilink"],$_REQUEST["kirjeldus"]);
        $kask->execute();
        header("Location: $_SERVER[PHP_SELF]");
        $connect->close();
        exit();
    }

    if(isSet($_REQUEST["kustutusid"])){
        $kask=$connect->prepare("DELETE FROM koerad WHERE id=?");
        $kask->bind_param("i", $_REQUEST["kustutusid"]);
        $kask->execute();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        img{
            width:300px;
            height:auto;
            display:block;
        }
        img a{
            display:block;
        }
        a.lisa{
            display: block;
            padding: 10px;
            margin-left: 25px;
            font-weight: bold;
            text-decoration: none;
            font-size: 30px;
        }
        a.kustuta{
            display: block;
            padding: 10px;
            margin-left: 10px;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>
<h1>Jaagup Kippari ülesanded</h1>
    <ol>
        <li><a href="?page=teated">Teadete kuvamine</a></li>
        <li><a href="?page=koeradtoonidega">Värvilised koerad</a></li>
        <li><a href="?page=koerad">Ülesanne: Koerte info koos lisamise ja kustutamisega</a></li>
    </ol>

<?php

    if(isSet($_REQUEST["lisamine"])){
        ?>
        <form action='?'>
            <input type="hidden" name="uusleht" value="jah" />
            <h2>Koera lisamine</h2>
            <dl>
                <dt>Nimi:</dt>
                <dd>
                    <input type="text" name="nimi" />
                </dd>
                <dt>Pildilink:</dt>
                <dd>
                    <input type="text" name="pildilink" />
                </dd>
                <dt>Kirjeldus:</dt>
                <dd>
                    <textarea rows="20" name="kirjeldus"></textarea>
                </dd>
            </dl>
            <input type="submit" value="sisesta">
        </form>
        <?php
    }

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
    if (isset($_GET['page']) && $_GET['page'] == 'koeradtoonidega') {
        $dogs = $connect -> prepare("SELECT id, nimi, toon FROM koerad");
        $dogs -> bind_result($id, $nimi, $toon);
        $dogs -> execute();
        while($dogs->fetch()){
            if(!empty($toon)){
                echo "<h4 style ='color:$toon;'>".htmlspecialchars($nimi)."</h4>";
            }
        }
    }

    if (isset($_GET['page']) && $_GET['page'] == 'koerad') {
        echo"<h1>Koerad</h1>";
        $dogs = $connect -> prepare("SELECT id, nimi, kirjeldus, pildilink FROM koerad");
        $dogs -> bind_result($id, $nimi, $kirjeldus, $pildilink);
        $dogs -> execute();
        echo "<ol>";
        while($dogs -> fetch()){
            echo "<li><a href='?id=$id'>".htmlspecialchars($nimi). "</a><img src='$pildilink'></li>";
            echo "<br /><a href='?kustutusid=$id' class='kustuta'>Kustuta koer ...</a>";
        }
        echo "</ol>";
        echo "<a href='?lisamine=jah' class='lisa'>Lisa koer ...</a>";
    }
?>

</body>
</html>