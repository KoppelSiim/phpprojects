<?php
    require($_SERVER["DOCUMENT_ROOT"]."/../config.php");
    $coffeeMachine = "coffee_machine";
    $sqlCheckTable = "SHOW TABLES LIKE '$coffeeMachine'";
    $result = mysqli_query($connect, $sqlCheckTable);
   
    if (mysqli_num_rows($result) == 0) {
        $sqlCreateTable = "
        CREATE TABLE $coffeeMachine (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            package INT NOT NULL,
            cups INT NOT NULL
        )
        ";
        if (mysqli_query($connect, $sqlCreateTable)) {
            echo "Table '$coffeeMachine' created successfully.";

        } else {
            echo "Error creating table: " . mysqli_error($connect);
        }
    } else {
        $coffeeQuery = $connect->prepare("SELECT id, name, package, cups FROM $coffeeMachine");
        $coffeeQuery->bind_result($id, $name, $package, $cups);
        $coffeeQuery->execute();
?>
<h1>Haldus leht </h1>
<form class="submitForm" method="POST" action="add_drink.php">
    <div class="form-item">
        <label for="name" class="form-label">Joogi nimi</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Sisesta jook..." required>
    </div>
    <div class="form-item">
        <label for="package" class="form-label">Täitepaki suurus</label>
        <input type="number" class="form-control" id="package" name="package" min="1" max="1000" required>
    </div> 
    <div class="form-item">
        <button type="submit" class="btn btn-primary">Lisa jook</button>
    </div>
</form>

<form class="submitForm">
<h2>Joogid</h2>
<?php
        while($coffeeQuery->fetch()) {
            echo "<div class='form-item'>";
                echo "Nimi: ". htmlspecialchars($name). "</br>";
                echo "Topse: ". htmlspecialchars($cups). "</br>";
                echo "<a href='?add-package=$id'>Lisa pakk</a></br>";
                if($cups == 0){
                    echo"<a href='?delete-drink=$id'>Kustuta jook</a></br>";
                }
            echo "</div>";
        }
        $coffeeQuery->close();
    }
?>
</form>
