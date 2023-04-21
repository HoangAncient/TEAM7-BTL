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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" class="css">
    <link rel="stylesheet" href="../assets/css/bootstrapcss/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/studentUI.css">


    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background: linear-gradient(90deg, #0586EC 0%, #531BB0 100%);;">
        <div class="container-fluid align-text-center" style="font-family: 'Poppins';font-weight: 700; font-size:1.5rem;">
            <a class="navbar-brand" href="#">
                <img src="../assets/image/Logo.svg" alt="Logo" height="42px" class="d-inline-block align-text-center">
                <b style="color:#000000; font-size:1.25rem;">Elena</b>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="mx-auto" style="width:40%">
                    <form class="d-flex" role="search" style="width:100%;">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm khóa học" aria-label="Search"><i class="bi bi-search"></i>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <ul class="navbar-nav d-flex align-items-center me-2 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <h2 style="font-family: 'Inter';color: #FFFFFF;font-weight: 700; font-size:1.2rem;vertical-align:middle">Khóa học của tôi</h2>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user">
                                <img src="../assets/image/ava.jpg" alt="Avatar">
                            </div>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <ul>
            </div>

        </div>
    </nav>


    <!-- =======================================content============================== -->
    <div class="containers">
        <div class="main">
            <div class="main-header">
                <h4>Danh sách bài kiểm tra</h4>
            </div>

            <div id="testList"></div>
            <div class="main-header">
                <h4>Dang sách bài học</h4>
            </div>
            <div id="lectureList" class="container"></div> <!-- Lecture list -->
        </div>

    </div>


    <br>

</body>

</html>

<script>
    var courses;
    var lectures;
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
                    d += '<a href = "studentQuestion.php?testID=' + v['testID'] + '">';
                    d += '<div class="test">';
                    d += '<div class="testDetails">'
                    d += '<h5 id =' + v['testID'] + '>                  <span> ' + index + '. </span>' + v['testName'] + ' lớp ' + v['courseClassID'] + '</h5>';
                    d += '</div>';
                    d += '</div>';
                    d += '</a>';
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
                    d += '<a href = "studentLecture.php?lectureID=' + v['lectureID'] + '"><h5 id =' + v['lectureID'] + '> <span class = "text-danger"> ' + index + '. ' + v['filepath'] + ' lớp ' + v['classID'] + '</span></h5></a>';
                    d += '</div>';
                    index++;
                });

                $('#lectureList').html(d);
            }
        });
    }
</script>