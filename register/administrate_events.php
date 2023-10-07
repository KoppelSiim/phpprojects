<?php
 $eventQuery = $connect->prepare("SELECT id, event, time FROM schedule");
 $eventQuery ->bind_result($id, $event, $time);
 $eventQuery ->execute();
?>

<div class="container">
    <h1 style="margin-left: 15px; margin-bottom: 30px;">Administraatori leht</h1>
    <h4 style="margin-left: 15px;">Halda kava</h4>
    <div class="submitForm">
<?php
    while($eventQuery->fetch()){
        echo "<div class='data-item'>";
            echo "<div class='form-data'>";
                echo "Üritus: ". htmlspecialchars($event);
            echo "</div>";
            echo "<div class='form-data'>";
                echo "Toimumisaeg: ". htmlspecialchars($time);
            echo "</div>";
            echo "<form method='post' action='delete_item.php'>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "<button type='submit' class='btn-danger' name='deleteEvent'>Kustuta kirje</button>";
            echo "</form>";
        echo "</div>";
    }
?>
    </div>
</div>
