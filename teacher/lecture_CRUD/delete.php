<?php
  include "../../config.php";

  if (isset($_GET['id'])) {
    $lecture_id = $_GET['id'];
    // We cannot use 'POST' here because 'POST' method sends data in the HTTP request body,
    // while the 'GET' method sends data in the URL query string. With that being said, if we use 
    // 'POST' here, the code will not work since 'POST' only works with form submission, and we have to
    // use 'GET' to take the 'id' value directly from the URL query string 

    $sql = "DELETE FROM sample1 WHERE id = '$lecture_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
      header("Location: view.php");
    } else {
      header("Location: delete.php?error=Delete failed!");
    }
  }
?>