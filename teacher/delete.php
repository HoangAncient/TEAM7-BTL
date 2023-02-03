<?php
include '../config.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $delete_image = "SELECT filepath FROM question WHERE id = '$user_id'";
    $filepath = $conn->query($delete_image);
    if ($filepath->num_rows > 0) {
        $row = $filepath->fetch_assoc();
        unlink('./assets/image/' . $row['filepath']);
        // echo $row['filepath'];
    }

    $sql = "DELETE FROM question WHERE id = '$user_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record deleted successfully";
        header('Location: view.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}