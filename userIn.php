<?php


    include "config.php";

    $username = $_POST["uname"];
    $usergrade = $_POST["grade"];
    $timeStart = $_POST['start'];
    $timeEnd = $_POST['end'];

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);

    // if (mysqli_num_rows($result) === 1) {
    //     echo "Tên đăng nhập đã tồn tại, mời nhập lại";
    // } else 
    
    $sqli = "INSERT INTO user(username, usergrade, timeStart, timeEnd) VALUES ('$username', '$usergrade' , '$timeStart' , '$timeEnd')";
    $resulti = $conn->query($sqli);


?>