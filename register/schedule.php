<?php
$scheduleQuery = $connect->prepare("SELECT id, event, time FROM schedule ORDER BY time ASC");
$scheduleQuery->bind_result($id, $event, $time);
$scheduleQuery->execute();
?>

<h1 style="margin-left: 15px;">Ajakava</h1>
<div class="submitForm">

<?php
    while($scheduleQuery->fetch()){
        echo "<div class='data-item'>";
            echo "<div class='form-data'>";
                echo "Sündmus: ". htmlspecialchars($event);
            echo "</div>";
            echo "<div class='form-data'>";
                echo "Kellaaeg: ". htmlspecialchars($time);
            echo "</div>";
        echo "</div>";
    }
$scheduleQuery->close();
$connect->close();
?>

</div>


