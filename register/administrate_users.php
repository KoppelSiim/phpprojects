<?php
 $order = $connect->prepare("SELECT id, first_name, last_name, email FROM user");
 $order->bind_result($id, $first_name, $last_name, $email);
 $order->execute();
?>

<!-- <div class="container"> -->
    <h1 style="margin-left: 15px; margin-bottom: 30px;">Administraatori leht</h1>
    <h4 style="margin-left: 15px;">Halda külalisi</h4>
    <div class="submitForm">
<?php
    while($order->fetch()){
        echo "<div class='data-item'>";
            echo "<div class='form-data'>";
                echo "Eesnimi: ". htmlspecialchars($first_name);
            echo "</div>";
            echo "<div class='form-data'>";
                echo "Perekonnanimi: ". htmlspecialchars($last_name);
            echo "</div>";
            echo "<div class='form-data'>";
                echo "E-mail: ". htmlspecialchars($email);
            echo "</div>";
            echo "<form method='post' action='delete_item.php'>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "<button type='submit' class='btn-danger' name='deleteUser'>Kustuta kirje</button>";
            echo "</form>";
        echo "</div>";
    }
?>
    </div>
<!-- </div> -->

