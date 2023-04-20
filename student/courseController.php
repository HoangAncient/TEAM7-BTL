<?php session_start();

include "../config.php";

if (isset($_SESSION['ID']) && isset($_SESSION['account'])) {

    $ID = $_SESSION['ID'];
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=elena", $username, $password);
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    if (isset($_SESSION['isTeacher']) && (!$_SESSION['isTeacher'])) {
    $sql = $conn->prepare("SELECT * FROM courseclass cc join courses c on c.courseID = cc.courseID");
    $sql->execute();
    // $index = 1;
    // $data='';
    
    echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC),JSON_UNESCAPED_UNICODE);
    }



}

    ?>