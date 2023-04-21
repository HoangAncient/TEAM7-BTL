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

    .return_teacher_home {
      padding-left: 25px;
      padding-top: 25px;
    }
  </style>
</head>
<body>
  <div class = "return_teacher_home">
    <button onclick = "return_teacher_home()">Back to teacher home</button>
    <br><br><br>
  </div>

  <div class = "div1">
    <br>
    <?php
      include "../../config.php";

      $sql = "SELECT * from lecture";
      // At first I just select 'filepath', resulting in Undefined array key in line 34 where I 
      // want to access the 'id' column in the table => Best practice: SELECT * FROM ... 
      $result = $conn->query($sql);
      $count = 0;
      if($result->num_rows > 0) {
        while ($info = $result->fetch_assoc()) {
          //echo "Lecture ".$count."&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo "Lecture $count";
          ?>
            <div style="font-size: 18px">
              <b>Lecture <?php echo $count ?>: </b><?php echo $info['filepath'] ?> &nbsp;&nbsp;            
          <?php
            
            $count++;
          ?>   
              <a class = "btn btn-danger" href="delete.php?id=<?php echo $info['lectureID'] ?>">Delete</a> <br>
            </div>

          <?php
          if (strpos($info['filepath'], '.mp4') !== false || strpos($info['filepath'], '.mkv') !== false) {
            ?>
            <video width="900" height="500" controls> <!-- 'controls' attribute for adding playback controls, such as a play/pause button, a volume control, and a progress bar -->
              <source src="file/<?php echo $info['filepath']; ?>" type="video/webm">
            </video>
            <?php
          } else {
            $file_path = "file/" .$info['filepath'];
            $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
            if ($file_ext == 'pdf') {
            ?>
              <embed src="file/<?php echo $info['filepath'] ?>" type="application/pdf" width="900" height="500">
            <?php
            } else if ($file_ext == 'doc' || $file_ext == 'docx') {
              header('Content-Disposition: incline; filename="' .$info['filepath']. '"');
            ?>
              <iframe src="file/<?php echo $info['filepath'] ?>" width="900" height="500"></iframe>
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

<script>
  function return_teacher_home() {
    window.location.href = "../adminUI.php";
  }
</script>

