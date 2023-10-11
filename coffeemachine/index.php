<?php
/*
Andmetabeli kuju: (id, jooginimi, topsepakis, topsejuua)
Topside arv pakis näitab, mitu topsitäit saab juua ühe täitepakendi sisestamise peale.
Loo tabel SQL-lausega. Lisa joogina kohv. Täitepaki suuruseks 50 topsi jagu pulbrit,
algul masin tühi, juua pole midagi. 
Loo SQL-lause juua olevate topside arvu suurendamiseks täitepaki jagu. Käivita.
 
Automaadi käivitatav leht vähendab juua olevate topside arvu ühe võrra.
Vaataja leht näitab seda arvu.
 
Automaat saab hakkama mitme joogiga (kohv, tee, kakao). 
Lehel näidatakse vaid neid jooke, millel on vähemasti üks tops juua.
Joomise tulemusena vähendatakse vastava joogi olemasolevate topside loendurit.
Halduslehel saab joodavate topside arvu kogust suurendada täitepaki jagu.
 
*/ 
    require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
    global $connect;
    require("header.php");
    
    if(isset($_GET["page"])) {
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
?>