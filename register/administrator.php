<?php
require($_SERVER["DOCUMENT_ROOT"]."/../config.php");

$order = $connect->prepare("SELECT id, first_name, last_name, email FROM user");
$order->bind_result($id, $first_name, $last_name, $email);
$order->execute();
?>
<div class="container">
    <h1>Admin leht</h1>
    <div class="submitForm">
<?php
    while($order->fetch()){
    echo "<div class='form-item'>";
        echo "<div class='form-label'>";
            echo "Eesnimi: ". htmlspecialchars($first_name);
        echo "</div>";
        echo "<div class='form-label'>";
            echo "Perekonnanimi: ". htmlspecialchars($last_name);
        echo "</div>";
        echo "<div class='form-label'>";
            echo "E-mail: ". htmlspecialchars($email);
        echo "</div>";
    echo "</div>";
    }
?>
    </div>
</div>

