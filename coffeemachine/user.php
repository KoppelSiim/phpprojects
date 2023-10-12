<?php
require($_SERVER["DOCUMENT_ROOT"]."/../config.php");
$sqlDrinkQuery = $connect->prepare("SELECT id, name, package, cups FROM coffee_machine");
$sqlDrinkQuery->bind_result($id,$name,$package,$cups);
$sqlDrinkQuery->execute();
?>
<h1>Joogiautomaat</h1>
<div class="formSubmit" action="?">
<?php
    
    while($sqlDrinkQuery->fetch()){
        if($cups>0){
            echo "<div class='form-item'>";
                echo "<div class='form-label'>";
                    echo htmlspecialchars($name);
                echo "</div>";
                echo "<div class='form-label'>";
                    echo htmlspecialchars($cups);
                echo "</div>";
                echo "<a href='?update-drink=$id'>Joo</a>";
            echo "</div>";
        }
    }
    $sqlDrinkQuery->close();
?>
</div>