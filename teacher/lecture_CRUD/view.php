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

      $sql = "SELECT * from sample1";
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
              <a class = "btn btn-danger" href="delete.php?id=<?php echo $info['id'] ?>">Delete</a> <br>
            </div>

          <embed src="file/<?php echo $info['filepath']; ?>" type="application/pdf" width="900" height="500"> <br> <br> <br> <br>
          <?php
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

