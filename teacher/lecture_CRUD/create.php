<?php
  session_start();
  include "../../config.php";

  if (isset($_POST['submit'])) {
    $pdf = $_FILES['file']['name'];
    $pdf_type = $_FILES['file']['type'];
    $pdf_size = $_FILES['file']['size'];
    $pdf_tem_loc = $_FILES['file']['tmp_name'];
    $pdf_store = "file/".$pdf;

    $classID = $_SESSION['classID'];

    move_uploaded_file($pdf_tem_loc, $pdf_store);

    $sql = "INSERT INTO lecture(filepath, STT, classID) VALUES ('$pdf', 1, '$classID')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo "Successfully Uploaded!";
    } else {
      echo "Fail to upload!";
    }
  }
?>

<div class = "return_teacher_home">
  <button onclick = "return_teacher_home()">Back to teacher home</button>
  <br><br><br>
</div>

<div class = "lecture_create">
  <form action="" method="post" enctype="multipart/form-data">
    <label for="">Choose your PDF file</label>
    <br><br>
    <input type="file" name="file" id="file" required> <br> <br>
    <input type="submit" value="Upload File" name="submit">
  </form>
</div>

<script>
  function return_teacher_home() {
    window.location.href = "../adminUI.php";
  }
</script>

<style>
  .return_teacher_home {
    padding-left: 25px;
    padding-top: 25px;
  }

  .lecture_create {
    padding-left: 25px;
  }
</style>