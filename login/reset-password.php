<?php
session_start();
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap');

    body {
    text-align: center;
    background: #fff8d9;
}
form {
    display: inline-block;
}
.center{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px;
  background: white;
  border-radius: 10px;
  box-shadow: 10px 10px 15px rgba(0,0,0,0.05);
}
.center .con{
    position: relative;
}
</style>
<main>
    <body>
        <div class="center">
            <form action="includes/reset-request.inc.php" method="post">
            
             <h1>Reset your password</h1>
             <p>An email will be sent to you with instructions on how to reset your password</p>
                <div class="con">
                    <input type="email" name= "email" placeholder="Enter your email address"> <br>
                </div>  
               <button type="submit" name="reset-request-submit">Receive new password by email</button>
               <?php
            if (isset($_GET['reset'])) {
                if ($_GET['reset'] == "success") {
                    echo '<p>Check your email</p>';
                }
            }
            ?>
            </form>
        </div>
    </body>
</main>