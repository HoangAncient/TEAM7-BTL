<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=qrabiloo", $username, $password);
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }

    $testID = $_SESSION['testID'];
    $ID = $_SESSION['ID'];
    $sql = $conn->prepare("SELECT COUNT(*) as total FROM (select * from onexam where testID = '$testID' and studentID = '$ID')");
    $sql->execute();
    // $index = 1;
    // $data='';
    
    echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC),JSON_UNESCAPED_UNICODE);



?>