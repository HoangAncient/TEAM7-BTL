<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <style media = "screen">
    embed{
      border: 2px solid black;
      margin-top: 20px;
    }

    .div1 {
      margin-left: 170px;
    }
  </style>
</head>
<body>
  <div class = "div1">
    <?php
      include "../config.php";
      $lectureID = $_GET['lectureID'];

      $sql = "SELECT * from lecture where lectureID = '$lectureID'";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        while ($info = $result->fetch_assoc()) {
          ?>
            <div style="font-size: 18px">
              <b>Lecture <?php echo $info['lectureID'] ?>: </b><?php echo $info['filepath'] ?>
          <?php
          ?>  
        </div>

        <?php
        if (strpos($info['filepath'], '.mp4') !== false || strpos($info['filepath'], '.mkv') !== false) {
          ?>
          <video width="900" height="500" controls> <!-- 'controls' attribute for adding playback controls, such as a play/pause button, a volume control, and a progress bar -->
            <source src="../teacher/lecture_CRUD/file/<?php echo $info['filepath']; ?>" type="video/webm">
          </video>
          <?php
        } else{
          $file_path = "../teacher/lecture_CRUD/file/" . $info['filepath'];
          $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
          if($file_ext == 'pdf') {
          ?>
            <embed src="../teacher/lecture_CRUD/file/<?php echo $info['filepath']; ?>" type="application/pdf" width="900" height="500">
          <?php
          } else if($file_ext == 'doc' || $file_ext == 'docx') {
            header('Content-Disposition: incline; filename="' .$info['filepath']. '"');
          ?>
            <iframe src="../teacher/lecture_CRUD/file/<?php echo $info['filepath']; ?>" width="900" height="500"></iframe>
          <?php
          } else {
            echo 'Only pdf and doc files allowed!';
          }
        }
      }
    }
    ?>
  </div>
</body>
</html>