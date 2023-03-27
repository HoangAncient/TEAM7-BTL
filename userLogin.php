<?php
    session_start();
    include "config.php";
    if(isset($_POST['testID'])) {
        $testID = $_POST['testID'];
        $sql = "SELECT * FROM test WHERE testID = '$testID'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['testID'] === $testID && $row['studentOnly'] == 0) {
            echo "Logged in";
            $_SESSION['testID'] = $_POST['testID'];
            header("Location:questions.php");
            exit();
            } else {
                header("Location: index.php?error=Invalid ID");
            }
        } else {
            header("Location: index.php?error=Invalid ID");
        }
    }
    ?>
