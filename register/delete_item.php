<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete"])) {
    session_start();
    require($_SERVER["DOCUMENT_ROOT"]."/../config.php");
   
    $id = $_POST["id"];
    $deleteQuery = $connect->prepare("DELETE FROM user WHERE id = ?");
    $deleteQuery->bind_param("i", $id);

    if ($deleteQuery->execute()) {
        $_SESSION["delete_success"] = true;
        header("Location: index.php");
    } else {
        echo "Failed to delete the item.";
    }

    $deleteQuery->close();
    $connect->close();
}
?>
