<?php
    require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
    global $connect;

    $coffeeMachine = "coffee_machine";
    $sqlCheckTable = "SHOW TABLES LIKE '$coffeeMachine'";
    $result = mysqli_query($connect, $sqlCheckTable);
    // id, jooginimi, topsepakis, topsejuua
    if (mysqli_num_rows($result) == 0) {
        echo "Table does not exist";
    }
    else{
        $sqlCreateTable = "
        CREATE TABLE $coffeeMachine (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50),
            package INT,
            cups INT
        )
    ";

    }
?>