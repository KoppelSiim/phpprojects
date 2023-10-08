<?php
 $eventQuery = $connect->prepare("SELECT id, event, time FROM schedule");
 $eventQuery ->bind_result($id, $event, $time);
 $eventQuery ->execute();
?>

<!-- <div class="container"> -->
    <h1 style="margin-left: 15px; margin-bottom: 30px;">Administraatori leht</h1>
    <h4 style="margin-left: 15px;">Halda kava</h4>
    <form class="submitForm" method="POST" action="schedule_process.php">
        <div class="form-item">
            <label for="event" class="form-label">Üritus</label>
            <input type="text" class="form-control" id="event" name="event" placeholder="Sisesta üritus ...">
        </div>
        <div class="form-item">
            <label for="time" class="form-label">Kellaaeg</label>
            <input type="time" class="form-control" id="time" name="time" placeholder="Sisesta algusaeg ...">
        </div> 
        <div class="form-item">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

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
<!-- </div> --- 
