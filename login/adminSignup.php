<?php
    include '../config.php';
    session_start();
    if(isset($_POST['submit'])) {
        $_SESSION['submit'] = $_POST['submit'];
        $_SESSION['adminAcc'] = $_POST['adminAcc'];
        $_SESSION['adminPass'] = $_POST['adminPass'];
        $_SESSION['password_check'] = $_POST['password_check'];
        $_SESSION['firstName'] = $_POST['firstName'];
        $_SESSION['lastName'] = $_POST['lastName'];
        $_SESSION['middleName'] = $_POST['middleName'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['birthday'] = $_POST['birthday'];
        $_SESSION['phone'] = $_POST['phone'];

        header('Location: ./validate.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/adminLoginedit.css">

    <style>
         * {
     padding: 0;
     margin: 0;
     list-style: none;
 }


 body {
     margin: 0;
     height: 100vh;
     width: 100vw;
     background: url("../assets/background-img/background.jpg") repeat top left 100%;
 }


#content {
    position: relative;
    width: 400px;
    height: 100%;
    margin-top: auto;
    margin-bottom: auto;
    padding: 30px;
    margin: 6rem auto;
    background: #FCFBFA;
    border-radius: 8px;

}

#content .acc-form, #content .pass-form{
    margin-top: 10px;
    position: relative;
    /* left: 50%; */
    /* transform: translateX(-50%); */
    padding: 15px;
    width: 90%;
    border: solid 1px black;
    font-size: 16px;
    border-radius: 5px;
}  

.log {
    margin-bottom: 20px;
    font-size: 35px;
    text-align: center;

}

.error {
    /* background: #F2DEDE; */
    background: #e7d2c8;

    color: red;
 
    padding: 10px;
 
    width: 95%;
 
    border-radius: 5px;
 
    margin: 20px auto;

    text-align: center;
}
.submit {
    position: relative;
    left: 50%;
    margin-top: 30px;
    transform: translateX(-50%);
    padding: 10px 20px;
    background-color: #6A9D67;
    color: white;
    font-size: 20px;
    width: 98%;
    border-radius: 10px;
}

.form-label {
    margin-top: 20px;
    font-size: 20px;
    line-height: 1.5;
    padding: 10px;
}
 

.s2 {
    margin-top: 15px;
}


.need-help {
    position: absolute;
    font-size: 20px;
    color: #BB501C;
    bottom: 10%;
    left: 50%;
    transform: translateX(-50%);
}

.sign_up {
    display: flex;
    justify-content: center;
    padding-top: 20px;
}

.required {
    color: #FF0000;
}

@media (min-width: 481px) {
    
}
@media (max-width: 480px) {
    #content {
        width: 100vw;
        box-sizing: border-box;
    }
    
    
}
</style>
        
</head>
<body>
    <div class="all">
        <div id="content">
            <div id="login-content">
                <form action = "" id="my-form" method="POST" class="sign-up-form">
                    <h2 class="log"> Sign up</h2>
                    <p><span class = "required">* required field</span></p> <br>
                    <div class="s1"><label class="form-label s1" for="adminAcc">Username <span class = "required">*</span> </label><br></div>
                    <input class="acc-form" type="text" id="adminAcc" name="adminAcc" value="" placeholder="Please enter your username" required><br>
                    <div class="s2"><label class="form-label" for="adminPass">Password <span class = "required">*</span></label><br></div>
                    <input class="pass-form" type="password" id="adminPass" name="adminPass" value="" placeholder="Please enter your password" required><br><br>
                    <div class="s3"><label class="form-label" for="password_check">Confirm password <span class = "required">*</span></label><br></div>
                    <input class="pass-form" type="password" id="password_check" name="password_check" value="" placeholder="Please confirm your password" required><br><br>
                    
                    <div>
                        <label class="form-label" for="firstName">First Name <span class = "required">*</span></label><br>
                        <input class="pass-form" type="text" id="firstName" name="firstName" value="" placeholder="Please enter your first name" required> <br><br>
                    </div>

                    <div>
                        <label class="form-label" for="lastName">Last Name <span class = "required">*</span></label><br>
                        <input class="pass-form" type="text" id="lastName" name="lastName" value="" placeholder="Please enter your last name" required> <br><br>
                    </div>

                    <div>
                        <label class="form-label" for="email">Email <span class = "required">*</span></label><br>
                        <input class="pass-form" type="email" id="email" name="email" value="" placeholder="Please enter your email" required> <br><br>
                    </div>

                    <div>
                        <label class="form-label" for="middleName">Birthday <span class = "required">*</span></label><br>
                        <input class="pass-form" type="date" id="birthday" name="birthday" value="" placeholder="Please enter your birthday" required> <br><br>
                    </div>

                    <div>
                        <label class="form-label" for="phone">Phone number <span class = "required">*</span></label><br>
                        <input class="pass-form" type="text" id="phone" name="phone" value="" placeholder="Please enter your phone number" required> <br><br>
                    </div>
                    
                    <?php if (isset($_GET['error'])) { ?>

                        <p class="error"><?php echo $_GET['error']; ?></p>

                    <?php } ?>

                    <input class="submit" type="submit" value="Sign up" name = "submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>