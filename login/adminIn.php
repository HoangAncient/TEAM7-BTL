<?php session_start();
include "../config.php";

if (isset($_POST['adminAcc']) && isset($_POST['adminPass'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Acc = validate($_POST['adminAcc']);
    $Pass = validate($_POST['adminPass']);
}



$sql = "SELECT * FROM person WHERE account = '$Acc' and pass ='$Pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['account'] === $Acc && $row['pass'] === $Pass) {
        echo "Logged in";
        $_SESSION['account'] = $row['account'];
        $_SESSION['ID'] = $row['ID'];
        $_SESSION['isTeacher'] = $row['isTeacher'];
        if ($row['isTeacher']) {
            header('Location: ../teacher/teacherIndex.php');
        } else {
            header('Location: ../student/studentIndex.php');
        }
        exit();
    } 
    else {
        echo "<h1> Login failed. Invalid username or password.</h1>";  
        header("Location: ./adminLogin.php?error=Incorrect username or password");
        exit();
    }
} else {

}

{

    header("Location: ./adminLogin.php?error=Incorect User name or password");

    exit();

}
?>
