<?php session_start();

include "../config.php";

if (isset($_SESSION['ID']) && isset($_SESSION['account']) && $_SESSION['isTeacher']) {

    $ID = $_SESSION['ID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-/LjQZzcpTzaYn7qWqRIWYC5l8FWEZ2bIHIz0D73Uzba4pShEcdLdZyZkI4Kv676E" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/afterLoginUI.css">
</head>
<body>
<div class="container header">
        <div class="col-lg-1"><a href="#">Trang chủ</a></div>
        <div class="col-lg-1"><a href="./studentList.php">Danh sách sinh viên lớp</a></div>
        <div class="col-lg-1"><a href="../login/adminLogout.php">Sign Out</a></div>
        
    </div>
<div id="courseList" class="container"></div>
</body>
</html>
<script>
    var courses;
    window.onload = function GetCourse() {
        $.ajax({
            url: 'teacherControl.php',
            type: 'get',
            success: function(data) {
                courses = jQuery.parseJSON(data);
                index = 1;
                let d = '';
                $.each(courses, function(k, v) {
                    d += '<div class="course">';
                    d += '<a href = "adminUI.php?classID='+ v['classID'] +'"><h5 id =' + v['classID'] + '> <span class = "text-danger"> ' + index + '. </span>' + v['courseName'] + ' lớp ' + v['classID']+'</h5></a>';
                    d += '</div>';
                    index++;

                });

                $('#courseList').html(d);
            }
        });
    }
</script>


<?php } else {
    header("Location: ../login/adminLogin.php");
} ?>