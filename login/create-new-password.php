<?php
    session_start();
?>

    <main>
        <div class="wrapper-main">
            <section class="section-default">
                <?php
                
                    $selector = $_GET['selector'];
                    $validator = $_GET['validator'];

                    // Check if token exist inside the url
                    if (empty($selector) || empty($validator)) {
                        echo "Could not validate request";
                    } else {
                        // check if these token is in hexadecimal format
                        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                            ?>

                            <!-- Check the token inside the database to make sure this is the correct user -->
                            <form action="includes/reset-password.inc.php" method = "post">
                                <!-- hidden: cannot see it inside the browser -->
                                <input type="hidden" name = "selector" value = "<?php echo $selector ?>">
                                <input type="hidden" name = "validator" value = "<?php echo $validator ?>">
                                <input type="password" name = "pwd" placeholder="Enter a new password">
                                <input type="password" name = "pwd-repeat" placeholder="Repeat new password">
                                <button type="submit" name = "reset-password-submit">Reset password</button>
                            </form>

                            <?php
                        }
                    }

                ?>
            </section>
        </div>
    </main>