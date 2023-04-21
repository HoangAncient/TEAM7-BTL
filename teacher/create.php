<?php
session_start();



if (isset($_SESSION['ID']) && isset($_SESSION['account']) && isset($_SESSION['db']) && $_SESSION['isTeacher']) {
    $db = $_SESSION['db'];
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/create.css">
</head>

<body>
    <br>
    <h2 class = "update_form"> Create question form </h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <fieldset class = "Fieldset">
            <legend class = "Legend">Insert Question</legend>
            <div class="parent">
                <div  class="child">Question:
                <br>
                    <textarea id ="quest" type="text" name="quest">
                    </textarea>
                    Description picture:
                    <br>
                    <input class="form-control" type="file" name="uploadfile" value="" />
                </div>
                <br>
                <!-- <div class="chi -->
            <br>
            <div class="child">
                Answer1: <br>
                    <input type="text" name="answer1" required>
            <br>Answer2: <br>
                    <input type="text" name="answer2" required>
                <br>
                Answer3: <br>
                    <input type="text" name="answer3" required>
                <br>
                Answer4:<br>
                    <input type="text" name="answer4" required>
                <br>
                Chapter:<br>
                    <input type="text" name="chapter" required>
                <br>
                Hardmode:<br>
                    <input type="text" name="hardmode" required>
                <br>
                <br>
                </div>
                </div>
                Ranswer:<br>
                <br>
                    <input type="radio" name="ranswer" value="answer1" required>Answer1
                    <input type="radio" name="ranswer" value="answer2">Answer2
                    <input type="radio" name="ranswer" value="answer3">Answer3
                    <input type="radio" name="ranswer" value="answer4">Answer4
                <br>    
                    <input class = "button" type="submit" name="submit" value="Submit">
        </fieldset>
    </form>

    <a type = "button" href="view.php">Xem cơ sở dữ liệu.</a>
    <?php if (isset($_GET['show'])) { ?>
        <div id="invalid" style="text-align: center; color: red; padding-top: 1%; margin: 0; font-size: 1.2rem"><?php echo $_GET['show']; ?></div>
      <?php } ?>
</body>

</html>

<?php
include "../config.php";
if (isset($_POST['submit'])) {
    $quest = $_POST['quest'];
    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
    $answer3 = $_POST['answer3'];
    $answer4 = $_POST['answer4'];
    $ranswer = $_POST['ranswer'];
    $chapter = $_POST['chapter'];
    $hardmode = $_POST['hardmode'];
    $chapter = $chapter.".".$hardmode;

    $filename = $_FILES['uploadfile']['name'];
    $reFilename = $filename;
    // str_replace('_', ' ', $reFilename);
    for ($i = 0; $i < strlen($reFilename); $i++) {
        if ($reFilename[$i] == ' ') {
            $reFilename[$i] = '_';
        }
    }
    // rename($filename, $reFilename);
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../assets/image/" . $reFilename;
    
    $check_uploaded = true;
    if (!is_uploaded_file($tempname)) $check_uploaded = false;
    
    if ($check_uploaded == false) {
        $sql = "INSERT INTO question(quest,answer1,answer2,answer3,answer4,ranswer, bankID, chapter) VALUES ('$quest','$answer1','$answer2','$answer3','$answer4','$ranswer', '134', '$chapter')";
    } else {
        $sql = "INSERT INTO question(quest,filepath, answer1,answer2,answer3,answer4,ranswer,bankID, chapter) VALUES ('$quest','$reFilename' ,'$answer1','$answer2','$answer3','$answer4','$ranswer', '134', '$chapter')";
        if (!move_uploaded_file($tempname, $folder)) {
            echo "<h3> Image not uploaded successfully!</h3>";
        }
    }

$result = $conn->query($sql);

if ($result == TRUE) {
     header("Location:create.php?show= Question recorded!");
    //  echo $filename . " " . $tempname;
} else {
    header("Location:create.php?show=Error !!!!");
}


$conn->close();
// }


}
}else {
    header("Location: ../login/adminLogin.php");
}?>