<?php session_start();

include "../config.php";

if (isset($_SESSION['ID']) && isset($_SESSION['account']) && (!$_SESSION['isTeacher'])) {

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

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-/LjQZzcpTzaYn7qWqRIWYC5l8FWEZ2bIHIz0D73Uzba4pShEcdLdZyZkI4Kv676E" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" class="css">
            <link rel="stylesheet" href="../assets/css/bootstrapcss/bootstrap.css">
            <link rel="stylesheet" href="../assets/css/homeIndex.css">
            <script src="../assets/js/bootstrapjs/bootstrap.bundle.js"></script>
        </head>

    <body>
        <!-- ===================================== nav ================================= -->
        <nav class="navbar navbar-expand-lg" style="background: linear-gradient(90deg, #0586EC 0%, #531BB0 100%);;">
            <div class="container-fluid align-text-center" style="font-family: 'Poppins';font-weight: 700; font-size:1.5rem;">
                <a class="navbar-brand" href="#">
                    <img src="../assets/image/Logo.svg" alt="Logo" height="37px" class="d-inline-block align-text-center">
                    <b style="color:#000000; font-size:1.2rem;">Elena</b>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="mx-auto" style="width:40%">
                        <form class="d-flex" role="search" style="width:100%;">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm khóa học" aria-label="Search"><i class="bi bi-search"></i>
                            <button class="btn btn-primary" type="submit"><img src="../assets/image/search.svg" alt=""></button>
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
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Trang cá nhân</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../login/adminLogout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign Out</a></li>
                            </ul>
                        </li>
                        <ul>
                </div>

            </div>
        </nav>





        <!--================================== content ========================================-->

        <div class="containers">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                            <div class="icon"><i class="fa-solid fa-house"></i></ion-icon></div>

                            <div class="title">Home</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="icon"><i class="fa-sharp fa-solid fa-lightbulb"></i></ion-icon></div>

                            <div class="title">Study</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="icon"><i class="fa-solid fa-store"></i></i></div>

                            <div class="title">Redeem</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="icon"><i class="fa-solid fa-book"></i></div>

                            <div class="title">Contest</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="icon"><i class="fa-solid fa-bell"></i></div>
                        </a>
                    </li>
                </ul>
            </div>


            <!-- ============================= main =================================== -->
            <div class="main">
                <div class="main-header">
                    Danh sách khóa học
                </div>
                <div id="courseList" class="container"></div>
            </div>





            <!-- Calendar -->
            <div class="calendar">
                <?php
                $today = strtotime("today");
                $month = date('m', $today);
                $year = date('Y', $today);
                $numDays = date('t', $today);
                $firstDay = mktime(0, 0, 0, $month, 1, $year);
                $monthName = date('F', $firstDay);
                $dayOfWeek = date('D', $firstDay);
                $days = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
                $offset = array_search($dayOfWeek, $days);
                $today = date('j');

                echo "<h2>$monthName $year</h2>";
                echo "<table>";
                echo "<tr>";
                foreach ($days as $day) {
                    echo "<th>$day&nbsp;</th>";
                }
                echo "</tr>";
                echo "<tr>";
                for ($i = 0; $i < $offset; $i++) {
                    echo "<td></td>";
                }
                for ($i = 1; $i <= $numDays; $i++) {
                    $dayOfWeek = date('D', mktime(0, 0, 0, $month, $i, $year));
                    $cellClass = '';
                    if ($dayOfWeek == 'Sun') {
                        echo "</tr><tr>";
                    }
                    if ($i == $today) {
                        $cellClass = 'today';
                    }
                    echo "<td class='$cellClass'>$i&nbsp;</td>";
                }
                echo "</tr>";
                echo "</table>";
                ?>
            </div>

    </body>

    </html>
    <script>
        var courses;
        window.onload = function GetCourse() {
            $.ajax({
                url: 'courseController.php',
                type: 'get',
                success: function(data) {
                    courses = jQuery.parseJSON(data);
                    index = 1;
                    let d = '';
                    $.each(courses, function(k, v) {


                        d += '<a href = "studentUI.php?classID=' + v['classID'] + '">';
                        d += '<div class="course  ' + v['courseID'] + '">';
                        d += '<div class = "singleCourse">'
                        d += '<h4 id =' + v['classID'] + '> ' + v['courseName'] + ' </h4>';
                        d += '</div>'
                        d += '<div class = "courseDetails">'
                        d += '<p>' + v['className'] + '</p>'
                        d += '</div>'
                        d += '</div>';
                        d += '</a>'
                        index++;

                    });

                    $('#courseList').html(d);
                    changeBgColor();

                }
            });
        }

        function changeBgColor() {
            const collection = document.getElementsByClassName("INT2204");
            for (let i = 0; i < collection.length; i++) {
                collection[i].style.background = "linear-gradient(180deg, #541AAF 0%, #008EF0 100%)";
            }
            const collection1 = document.getElementsByClassName("INT2208");
            for (let i = 0; i < collection1.length; i++) {
                collection1[i].style.background = "linear-gradient(180deg, #4E08A4 0%, #FF41E2 100%)";
            }
            const collection2 = document.getElementsByClassName("INT2211");
            for (let i = 0; i < collection2.length; i++) {
                collection2[i].style.background = "linear-gradient(180deg, #A00384 0%, #FE6E1B 100%)";
            }
            const collection3 = document.getElementsByClassName("INT2212");
            for (let i = 0; i < collection3.length; i++) {
                collection3[i].style.background = "linear-gradient(180deg, #00BADF 0%, #00F5BE 100%)";
            }
        }
    </script>

<?php } else {
    header("Location: ../login/adminLogin.php");
} ?>