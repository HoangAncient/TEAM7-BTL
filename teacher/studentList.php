<?php session_start();

include "../config.php";

if (isset($_SESSION['ID']) && isset($_SESSION['account']) && $_SESSION['isTeacher']) {
    $this_account = $_SESSION['account'];
    $sql = "select class from person where account = '$this_account'";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   $class = $row['class'];

  


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/view.css">
</head>

<body>
    <div class="container-fluid" id="direction" style="z-index: 1">  
        <button class="btn" style="float: left; margin-left: 5%; margin-right: auto"> <i class="bi bi-arrow-left" style="margin-right: 5%"></i> <a href="teacherIndex.php">Back</a></button>
        <button class="btn" style="float: right; margin-right: 5%; margin-left: auto"> <i class="bi bi-folder-plus" style="margin-right: 5%"></i> <a href="create.php">Add Student</a></button>
    </div>
    <div class="container table-responsive scrollable" style="z-index: 1">
        <table class="table ctable table-bordered table-hover table-sm" id="dataTable">
        <caption><h1 style="font-size: 2.5rem; color: #F7F7F7"> <?php echo $row['class']?> </h1></caption>
            <thead style="background-color: #25408f">
                <tr class="align-middle">
                    <th scope="col">Student ID</th>
                    <th scope="col">Account</th>
                    <th scope="col">Password</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Action</th>


                </tr>
            </thead>
            <tbody>
                <?php
                 $sql = "SELECT * FROM person where class in 
                 (select class from person where account = '$this_account')";
             $result = $conn->query($sql);
             $numbers_of_result = mysqli_num_rows($result);
             $result_per_page = 10;
             $numbers_of_page = ceil( $numbers_of_result / $result_per_page );
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }
            $this_page_first_result = ($page - 1) * $result_per_page;
             $sql = "SELECT * FROM person where class in 
             (select class from person where account = '$this_account') LIMIT " . $this_page_first_result . ',' . $result_per_page;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>

                        <tr class="align-middle">
                            <th scope="row"><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['account']; ?></td>
                            <td><?php echo $row['pass']; ?></td>
                            <td><?php echo $row['firstName']; ?></td>
                            <td><?php echo $row['lastName']; ?></td>
                            <td><?php echo $row['middleName']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['phoneNumber']; ?></td>
                            <td><?php echo $row['birthday']; ?></td>
                            <td width="13%" ><a href="../update.php?id=<?php echo $row['ID']; ?>" class="btn btn-info">Edit</a>                                <!-- &nbsp; -->
                                <a href="../delete.php?id=<?php echo $row['ID']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <tfoot style="background-color: #25408f">
                <tr>
                <th scope="col">Student ID</th>
                    <th scope="col">Account</th>
                    <th scope="col">Password</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Action</th>
                </tr>
            </tfoot>
        </table>


    </div>
    
       
    <?php
    for ($page = 1; $page <= $numbers_of_page; $page++) {
        echo '<a href="studentList.php?page=' . $page . '">'.$page.'</a>';
    }
    ?>
</body>
</html>

<?php }else {
    header("Location: ../login/adminLogin.php");
} ?>