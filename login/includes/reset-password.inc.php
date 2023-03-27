<?php

    if (isset($_POST['reset-password-submit'])) {
        $selector = $_POST['selector']; // to run a select statement inside the database
        $validator = $_POST['validator']; // to validate the proper user
        $password = $_POST['pwd'];
        $passwordRepeat = $_POST['pwd-repeat'];

        // // if user did not include password inside these field
        if (empty($password) || empty($passwordRepeat)) {
            header("Location: ../create-new-password.php?newpwd=empty");
            echo $password. " ". $passwordRepeat;
            exit();
        } else if ($passwordRepeat !== $password) { // if the 2 pwd does not match 
            header("Location: ../create-new-password.php?newpwd=pwdnotsame");
            exit();
        } 

    // Check the token
        $currentDate = date("U");

        require "dbh.inc.php";
        $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
        $stmt = mysqli_stmt_init($conn);

        // prepare the prepared statement
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error";
            exit();
        } else {
            // bind the data with the statement
            mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate); // tell it what "?" will be replaced with before we excute the staement

             // execute $sql statement inside the database
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if (!$row = mysqli_fetch_assoc($result)) { // if there is no row inside the database
                echo "You need to re-submit your request (1)";
                exit();
            } else {
                // convert to binary so we can match this with the token inside the database
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
                if ($tokenCheck == false) {
                    echo "You need to re-submit your request (2)";
                    exit();
                } else if ($tokenCheck == true) {
                    $tokenEmail = $row['pwdResetEmail'];

                    $sql = "SELECT * FROM person WHERE email=?;";
                    $stmt = mysqli_stmt_init($conn);

                    // prepare the prepared statement
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "There was an error (1)";
                        exit();
                    } else {
                        // bind the data with the statement
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail); // tell it what "?" will be replaced with before we excute the staement

                        // execute $sql statement inside the database
                        mysqli_stmt_execute($stmt);

                        $result = mysqli_stmt_get_result($stmt);
                        if (!$row = mysqli_fetch_assoc($result)) { // if there is no row inside the database
                            echo "There was an error (2)";
                            exit();
                        } else {
                        
                        // Update password
                            $sql = "UPDATE person SET pass=? WHERE email=?;";
                            $stmt = mysqli_stmt_init($conn);  

                            // prepare the prepared statement
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "There was an error (3)";
                                exit();
                            } else {
                                // $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                                
                                // bind the data with the statement
                                mysqli_stmt_bind_param($stmt, "ss", $password, $tokenEmail); // tell it what "?" will be replaced with before we excute the staement

                                // execute $sql statement inside the database
                                mysqli_stmt_execute($stmt);

                            // Delete the token
                                $sql = "DELETE FROM pwdReset WHERE pwdResetEmail = ?";
                                $stmt = mysqli_stmt_init($conn);

                                // prepare the prepared statement
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    echo "There was an error (4)";
                                    exit();
                                } else {
                                    // bind the data with the statement
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail); // tell it what "?" will be replaced with before we excute the staement
                                    mysqli_stmt_execute($stmt);
                                    echo "<p>Your password has been updated</p>";
                                    $loginLink = "http://localhost:8080/se_team7/TEAM7-BTL/login/adminLogin.php";
                                    echo "<a href=".$loginLink.">Back to log in</a>";
                                }
                            }
                        }
                    }
                }
 
            }
        }

    } else {
        header("Location: ../index.php?bug");
    }

?>