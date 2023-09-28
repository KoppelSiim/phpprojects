<?php
    require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
    global $connect;
    
    if(isSet($_REQUEST["uusleht"])){

        $kask=$connect->prepare("INSERT INTO lehed (pealkiri, sisu) VALUES (?, ?)");
        $kask->bind_param("ss", $_REQUEST["pealkiri"], $_REQUEST["sisu"]);
        $kask->execute();
        header("Location: $_SERVER[PHP_SELF]");
        $connect->close();
        exit();
    }
    if(isSet($_REQUEST["kustutusid"])){

        $kask=$connect->prepare("DELETE FROM lehed WHERE id=?");
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
    <title>Teated</title>
</head>
<body>
<div id="menyykiht">

<h2>Teated</h2>
<ul>
<?php
    $kask=$connect->prepare("SELECT id, pealkiri FROM lehed");
    $kask->bind_result($id, $pealkiri);
    $kask->execute();
    while($kask->fetch()){
        echo "<li><a href='?id=$id'>".
        htmlspecialchars($pealkiri)."</a></li>";
    }
?>

</ul>
<a href='?lisamine=jah'>Lisa ...</a>
</div>
<div id="sisukiht">
<?php

    if(isSet($_REQUEST["id"])){ 

        $kask=$connect->prepare("SELECT id, pealkiri, sisu FROM lehed WHERE id=?");
        $kask->bind_param("i", $_REQUEST["id"]);
        $kask->bind_result($id, $pealkiri, $sisu);
        $kask->execute();

        if($kask->fetch()){
            echo "<h2>".htmlspecialchars($pealkiri)."</h2>";
            echo htmlspecialchars($sisu);
            echo "<br /><a href='?kustutusid=$id'>kustuta</a>";
        } else {
            echo "Vigased andmed.";
        }
    } 
if(isSet($_REQUEST["lisamine"])) {
?>

<form method ="POST" action='?'>
<input type="hidden" name="uusleht" value="jah" />
<h2>Uue teate lisamine</h2>
<dl>
<dt><label for="pealkiri">Pealkiri: </label></dt>
<dd>
<input type="text" name="pealkiri" />
</dd>
<dt>Teate sisu:</dt>
<dd>
<textarea id="sisu" rows="20" name="sisu"></textarea>
</dd>
</dl>
<input type="submit" value="sisesta">
</form>
<?php

}

?>
</div>
</body>
</html>