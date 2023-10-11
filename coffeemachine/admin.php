<?php
    $coffeeMachine = "coffee_machine";
    $sqlCheckTable = "SHOW TABLES LIKE '$coffeeMachine'";
    $result = mysqli_query($connect, $sqlCheckTable);

    if (mysqli_num_rows($result) == 0) {
        $sqlCreateTable = "
        CREATE TABLE $coffeeMachine (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50),
            package INT,
            cups INT
        )
        ";
        if (mysqli_query($connect, $sqlCreateTable)) {
            echo "Table '$coffeeMachine' created successfully.";

        } else {
            echo "Error creating table: " . mysqli_error($connect);
        }
    } else {
        echo "Table '$coffeeMachine' already exists";
    }
    $connect->close();
?>