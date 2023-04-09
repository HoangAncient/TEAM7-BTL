<?php session_start();

include "../config.php";

if (isset($_SESSION['ID']) && isset($_SESSION['account']) && (!$_SESSION['isTeacher'])) {
    if (isset($_GET['classID'])) {
        $_SESSION['classID'] = $_GET['classID'];
    }
    $ID = $_SESSION['ID'];

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-/LjQZzcpTzaYn7qWqRIWYC5l8FWEZ2bIHIz0D73Uzba4pShEcdLdZyZkI4Kv676E" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../assets/css/afterLoginUI.css">
    <title>Document</title>
</head>
<body>
<div id="testList" class="container"></div> <!-- Test list-->
<br>
<div id="lectureList" class="container"></div> <!-- Lecture list -->
</body>
</html>

<script>
    var courses;
    window.onload = function GetCourse() {
        // Test showing
        $.ajax({
            url: 'testInClass.php',
            type: 'get',
            success: function(data) {
                tests = jQuery.parseJSON(data);
                index = 1;
                let d = '';
                $.each(tests, function(k, v) {
                    d += '<div class="test">';
                    d += '<a href = "studentQuestion.php?testID='+ v['testID'] +'"><h5 id =' + v['testID'] + '> <span class = "text-danger"> ' + index + '. </span>' + v['testName'] + ' lớp ' + v['courseClassID']+'</h5></a>';
                    d += '</div>';
                    index++;

                });

                $('#testList').html(d);
            }
        });

        // Lecture showing
        $.ajax({
            url: 'lectureInClass.php',
            type: 'get',
            success: function(data) {
                lectures = jQuery.parseJSON(data);
                index = 1;
                let d = '';
                $.each(lectures, function(k, v) {
                    d += '<div class="lecture">';
                    d += '<a href = "studentLecture.php?lectureID='+ v['lectureID'] + '"><h5 id =' + v['lectureID'] + '> <span class = "text-danger"> ' + index + '. ' + v['filepath'] + ' lớp ' + v['classID'] + '</span></h5></a>'; 
                    d += '</div>';
                    index++;
                });

                $('#lectureList').html(d);
            }
        });
    }
</script>
