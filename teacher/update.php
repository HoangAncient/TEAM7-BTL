<?php session_start();
include "../config.php";

if (isset($_SESSION['ID']) && isset($_SESSION['account']) && $_SESSION['isTeacher']) {



if (isset($_POST['update'])) {
    $quest = $_POST['quest'];
    $question_id = $_GET['id'];
    
    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
    $answer3 = $_POST['answer3'];
    $answer4 = $_POST['answer4'];
    $ranswer = $_POST['ranswer'];

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
    $folder = "./assets/image/" . $reFilename;

    $delete_image = "SELECT filepath FROM question WHERE id = '$question_id'";
    $filepath = $conn->query($delete_image);
    $oldFilepath = "";
    if ($filepath->num_rows > 0) {
        $row = $filepath->fetch_assoc();
        // unlink('./assets/image/' . $row['filepath']);
        $oldFilepath = $row['filepath'];
    }
    
    $check_uploaded = true;
    if (!is_uploaded_file($tempname)) $check_uploaded = false;
    
    if ($check_uploaded == false) {
        // $sql = "INSERT INTO question(quest,answer1,answer2,answer3,answer4,ranswer) VALUES ('$quest','$answer1','$answer2','$answer3','$answer4','$ranswer')";
        $sql = "UPDATE question SET quest = '$quest', answer1 = '$answer1', answer2 = '$answer2', answer3 = '$answer3', answer4 = '$answer4',  ranswer = '$ranswer' WHERE id = '$question_id'";
    } else {
        $sql = "UPDATE question SET quest = '$quest', filepath = '$reFilename', answer1 = '$answer1', answer2 = '$answer2', answer3 = '$answer3', answer4 = '$answer4',  ranswer = '$ranswer' WHERE id = '$question_id'";
        // $sql = "INSERT INTO question(quest,filepath, answer1,answer2,answer3,answer4,ranswer) VALUES ('$quest','$reFilename' ,'$answer1','$answer2','$answer3','$answer4','$ranswer')";
        if (!move_uploaded_file($tempname, $folder)) {
            echo "<h3> Image not uploaded successfully!</h3>";
        } else {
            unlink('./assets/image/' . $oldFilepath);
        }
    }


    // $sql = "UPDATE question SET quest = '$quest', answer1 = '$answer1', answer2 = '$answer2', answer3 = '$answer3', answer4 = '$answer4',  ranswer = '$ranswer' WHERE id = '$question_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "<p>Record Updated Succesfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header('Location: view.php');
}
if (isset($_GET['id'])) {
    $question_id = $_GET['id'];

    $sql = "SELECT *FROM question WHERE id = '$question_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $quest = $row['quest'];
            $filename = $row['filepath'];

            $question_id = $row['id'];
            $answer1 = $row['answer1'];
            $answer2 = $row['answer2'];
            $answer3 = $row['answer3'];
            $answer4 = $row['answer4'];
            $ranswer = $row['ranswer'];
        }

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
            <h2 class = "update_form"> Signup form </h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <fieldset class = "Fieldset">
                    <legend class = "Legend">Insert Question</legend>
                    <div class="parent">
                        <div  class="child">Question:
                        <br>
                            <textarea id ="quest" type="text" name="quest"><?php echo $quest ?></textarea>
                            Description picture:
                            <br>
                            (No file selected means old file will be used)
                            <br>
                            <input class="form-control" type="file" name="uploadfile" />
                        </div>
                        <br>
                        <!-- <div class="chi -->
                    <br>
                    <div class="child">
                        Answer1: <br>
                            <input type="text" name="answer1" value = <?php echo $answer1 ?> required>
                    <br>Answer2: <br>
                            <input type="text" name="answer2" value = <?php echo $answer2 ?> required>
                        <br>
                        Answer3: <br>
                            <input type="text" name="answer3" value = <?php echo $answer3 ?> required>
                        <br>
                        Answer4:<br>
                            <input type="text" name="answer4" value = <?php echo $answer4 ?> required>
                        <br>
                        <br>
                        </div>
                        </div>
                        Ranswer:<br>
                        <br>
                            <input type="radio" name="ranswer" value="answer1" <?php if ($ranswer == "answer1") echo "checked = \"checked\"" ?> required>Answer1
                            <input type="radio" name="ranswer" value="answer2" <?php if ($ranswer == "answer2") echo "checked = \"checked\"" ?>>Answer2
                            <input type="radio" name="ranswer" value="answer3" <?php if ($ranswer == "answer3") echo "checked = \"checked\"" ?>>Answer3
                            <input type="radio" name="ranswer" value="answer4" <?php if ($ranswer == "answer4") echo "checked = \"checked\"" ?>>Answer4
                        <br>    
                            <input class = "button" type="submit" name="update" value="Update">
                </fieldset>
            </form>

            <a type = "button" href="view.php">Quay lại</a>
        </body>

        </html>

<?php
    } else {
        header('Location: view.php');
    }
}
}
?>