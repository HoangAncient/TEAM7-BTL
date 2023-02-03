<?php session_start();

include "../config.php";

if (isset($_SESSION['ID']) && isset($_SESSION['account']) && $_SESSION['isTeacher']) {
$testID = $_GET['id'];

$sql = "SELECT *FROM onexam inner join person on onexam.studentID = person.id where testID = '$testID'";

$result = $conn->query($sql);
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
    <button class="btn" style="float: left; margin-left: 5%; margin-right: auto"> <i class="bi bi-arrow-left" style="margin-right: 5%"></i> <a href="adminUI.php">Back</a></button>
       
    </div>
    <div class="container table-responsive scrollable" style="z-index: 1">
        <table class="table ctable table-bordered table-hover table-sm" id="dataTable">
        <caption><h1 style="font-size: 1.5rem; color: #F7F7F7">ALL USERGRADE</h1></caption>
            <thead style="background-color: #25408f">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">StudentID</th>
                    <th scope="col">Student name</th>
                    <th scope="col">Grade</th>
                    <th scope="col">TimeStart</th>
                    <th scope ="col">TimeEnd</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            
            $name = $row['lastName'].' '.$row['middleName'].' '.$row['firstName']; 
            ?>  

                        <tr class="align-middle">
                            <td><?php echo $row['doID']; ?></td>
                            <td><?php echo $row['studentID']; ?></td>
                            <td><?php echo $name?></td>
                            
                            <td><?php echo $row['grade']; ?></td>
                            <td><?php echo $row['timeStart']; ?></td>
                            <td><?php echo $row['timeEnd']; ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <tfoot style="background-color: #25408f">
                <tr>
                <th scope="col">ID</th>
                    <th scope="col">StudentID</th>
                    <th scope="col">Student name</th>
                    <th scope="col">Grade</th>
                    <th scope="col">TimeStart</th>
                    <th scope ="col">TimeEnd</th>
                </tr>
            </tfoot>
        </table>
    </div>
    
       
    
</body>
</html>

<?php }else {
    header("Location: ../login/adminLogin.php");
} ?>