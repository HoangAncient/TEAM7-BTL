<?php
session_start();
include "../config.php";
if ( isset($_SESSION['ID']) && isset($_SESSION['testID']) && (!$_SESSION['isTeacher'])) {
    
    $grade = $_POST["grade"];
    $timeStart = $_POST['start'];
    $timeEnd = $_POST['end'];
    $studentID = $_SESSION['ID'];
    $testID = $_SESSION['testID'];

    $sql = "insert into onexam(grade,timeStart,timeEnd,studentID,testID) values ('$grade','$timeStart','$timeEnd','$studentID','$testID') ";
    $result = $conn->query($sql);
}
?>