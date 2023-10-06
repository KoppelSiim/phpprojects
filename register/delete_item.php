<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete"])) {
    require($_SERVER["DOCUMENT_ROOT"]."/../config.php");
    // Get the ID of the item to delete
    $id = $_POST["id"];

    // Perform the DELETE operation
    $deleteQuery = $connect->prepare("DELETE FROM user WHERE id = ?");
    $deleteQuery->bind_param("i", $id);

    if ($deleteQuery->execute()) {
        // Redirect back to the index after successful deletion
        header("Location: index.php");
        //exit();
    } else {
        echo "Failed to delete the item.";
    }

    //$deleteQuery->close();
    //$connect->close();
}
?>
