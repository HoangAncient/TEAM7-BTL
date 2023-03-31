<?php

    // Mailer library    
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        
        require 'phpmailer/PHPMailer/src/Exception.php';
        require 'phpmailer/PHPMailer/src/PHPMailer.php';
        require 'phpmailer/PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);

    //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = "minhwhisky700@gmail.com";                     
        $mail->Password   = "plwtbuqzeyigbrch";                              
        $mail->SMTPSecure = 'ssl';           
        $mail->Port       = 465; 

        $mail->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );

    if (isset($_POST["reset-request-submit"])) {
        
    // Create 2 tokens    
        // selector token
        $selector = bin2hex(random_bytes(8));  // create 8 random bytes and convert it to hexadecimal format
        
        // regular token: this is the one that actually authenticate the user to make sure this is the correct user
        $token = random_bytes(32);

    // create the link that is sent to user
        $url = "http://localhost/demwcontest/Wcontest-Team2/login/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);

        // create expiry date to our token
        $expires = date("U") + 1800; // today + 1800s 2
        
        // connect to database
        require "dbh.inc.php";

        $userEmail = $_POST["email"];

    // delete any existing entries of a token inside the database
        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail = ?";
        $stmt = mysqli_stmt_init($conn);

        // prepare the prepared statement
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error";
            exit();
        } else {
            // bind the data with the statement
            mysqli_stmt_bind_param($stmt, "s", $userEmail); // tell it what "?" will be replaced with before we excute the staement

             // execute $sql statement inside the database
            mysqli_stmt_execute($stmt);
        }

    // insert token inside the database
        $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        // prepare the prepared statement
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error";
            exit();
        } else {
            // hashing the token (we should not insert any sort of sensitive data inside database without protecting it first)
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);

            // bind the data with the statement
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires); // tell it what "?" will be replaced with before we excute the staement

             // execute $sql statement inside the database
            mysqli_stmt_execute($stmt);
        }
        
        mysqli_stmt_close($stmt);
        
    // Sending Email
        // $to = $userEmail;

        // $subject = 'Reset your password';

        // $message = '<p>We received a password request, the link to reset your password is below</p>';
        // $message .= '<p>Here is your password reset link: </br>';
        // $message .= '<a href="' . $url . '">' .$url. '</a></p>';
        
        // header for email
        // $headers = "From: peter <minhwhisky700@gmail.com>\r\n";
        // $headers .= "Reply-to: <minhwhisky700@gmail.com>\r\n";
        // $headers .= "Content-type: text/html\r\n";

        //mail($to, $subject, $message, $headers);

        try {
           
            $mail->setFrom('minhwhisky700@gmail.com', 'Peter'); // Hiển thị thông tin người gửi khi người nhập mở email

            $mail->addAddress(''.$userEmail.'', 'ResetPwdUser');  // Khai báo email người nhận

            $message = '<p>We received a password request, the link to reset your password is below</p>';
            $message .= '<p>Here is your password reset link: </br>';
            $message .= '<a href="' . $url . '">' .$url. '</a></p>';
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reset your password';
            $mail->Body    =  $message;
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        header("Location: ../reset-password.php?reset=success");

    } else {
        header("Location: ../index.php");
    }

?>