<?php
    session_start();
    include "../config.php";

    if (isset($_SESSION['ID']) && isset($_SESSION['account']) && $_SESSION['isTeacher'] && $_SESSION['classID']) {
        if (isset($_GET['q'])) {
            $str = $_GET['q'];
            $explode_str = explode('_', $str);
            $chapter = $explode_str[0];
            $questions = $explode_str[1];
            $int = (int)$questions;
            $testID = $explode_str[2];
            $sql = "insert into questintest(questionID, testID) select id, '$testID' from question where chapter = '$chapter' order by rand() limit $int";
            $result = $conn->query($sql);
            
            
        }
    }

?>