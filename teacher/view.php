<?php session_start();

include "../config.php";

if (isset($_SESSION['ID']) && isset($_SESSION['account']) && $_SESSION['isTeacher'] && isset($_SESSION['db'])) {
    $db = $_SESSION['db'];
$sql = "SELECT *FROM question where bankID = '134'";

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
        <button class="btn" style="float: right; margin-right: 5%; margin-left: auto"> <i class="bi bi-folder-plus" style="margin-right: 5%"></i> <a href="create.php">Add Question</a></button>
    </div>
    <div class="container table-responsive scrollable" style="z-index: 1">
        <table class="table ctable table-bordered table-hover table-sm" id="dataTable">
        <caption><h1 style="font-size: 1.5rem; color: #F7F7F7">ALL QUESTION</h1></caption>
            <thead style="background-color: #25408f">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Question</th>
                    <th scope="col" class="text-center">Picture</th>
                    <th scope="col" class="text-center">Answer1</th>
                    <th scope="col" class="text-center">Answer2</th>
                    <th scope="col" class="text-center">Answer3</th>
                    <th scope="col" class="text-center">Answer4</th>
                    <th scope="col" class="text-center">Right answer</th>
                    <th scope="col" class="text-center">Explaination</th>
                    <th scope="col" class="text-center">Chapter</th>
                    <th scope="col" class="text-center">Hardmode</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>

                        <tr class="align-middle">
                            <th scope="row"><?php echo $row['id']; ?></td>
                            <td><?php echo $row['quest']; ?></td>
                            <?php
                                if ($row['filepath'] != NULL) {
                                    $link = "../assets/image/" . $row['filepath'];
                                    // str_replace( "\\ ", " ", $link);
                                    // echo $link;
                                    ?>
                                    <td> <img src = <?php echo $link; ?> style = "width: 100px;"> </td>
                                    <?php
                                } else {
                                    ?>
                                    <td> </td>
                                    <?php
                                }
                            ?>
                            <td><?php echo $row['answer1']; ?></td>
                            <td><?php echo $row['answer2']; ?></td>
                            <td><?php echo $row['answer3']; ?></td>
                            <td><?php echo $row['answer4']; ?></td>
                            <td><?php echo $row['ranswer']; ?></td>
                            <td><?php echo $row['explaination']; ?></td>
                            <td><?php $chapter = $row['chapter'];
                            $explode = explode(".",$chapter);
                            echo $explode[0]; ?></td>
                            <td><?php echo $explode[1]; ?></td>
                            
                            <td width="13%" ><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>                                <!-- &nbsp; -->
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <tfoot style="background-color: #25408f">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Question</th>
                    <th scope="col" class="text-center">Picture</th>
                    <th scope="col" class="text-center">Answer1</th>
                    <th scope="col" class="text-center">Answer2</th>
                    <th scope="col" class="text-center">Answer3</th>
                    <th scope="col" class="text-center">Answer4</th>
                    <th scope="col" class="text-center">Right answer</th>
                    <th scope="col" class="text-center">Explaination</th>
                    <th scope="col" class="text-center">Chapter</th>
                    <th scope="col" class="text-center">Hardmode</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    
       
    
</body>
</html>

<?php }else {
    header("Location: ../login/adminLogin.php");
} ?>