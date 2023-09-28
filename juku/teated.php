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

<a href='?lisamine=jah'>Lisa ...</a>
<div id="sisukiht">

<?php
        
    echo"<h1>Teadete loetelu</h1>";
    $req = $connect -> prepare("SELECT id, pealkiri, sisu FROM lehed");
    $req -> bind_result($id, $pealkiri, $sisu);
    $req -> execute();
        while($req ->fetch()){
            echo "<h2>".htmlspecialchars($pealkiri)."</h2>";
            echo "<h4>".htmlspecialchars($sisu)."</h4>";
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