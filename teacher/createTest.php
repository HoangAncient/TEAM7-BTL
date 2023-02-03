<?php
     session_start();
     include "../config.php";
 
     if (isset($_SESSION['ID']) && isset($_SESSION['account']) && $_SESSION['isTeacher'] && $_SESSION['classID']) {
     if (isset($_GET['data'])) {
        $data = $_GET['data'];
        $data_split = explode('_',$data);
        $teacherID = $_SESSION['ID'];
        $classID = $_SESSION['classID'];
        $testID = $data_split[0];
        $testName = $data_split[1];
        $timeStart = $data_split[2];
        $timeEnd = $data_split[3];
        $timePeriod = $data_split[4];
        $studentOnly = $data_split[5];
        $turn = 1;

        $sql = "INSERT INTO test(testID, testName, courseClassID, teacherID, timeStart, timeEnd, timePeriod, studentOnly, turn) VALUES ('$testID','$testName','$classID','$teacherID', '$timeStart', '$timeEnd', '$timePeriod', '$studentOnly', '$turn') ";
        $result=$conn->query($sql);
    }
    
        
    
    
    }
?>