<?php
    session_start();
?>

    <main>
        <div class="wrapper-main">
            <section class="section-default">
                <h1>Reset your password</h1>
                <p>An email will be sent to you with instructions on how to reset your password</p>
                <form action="includes/reset-request.inc.php" method = "post">
                    <input type="text" name="email" placeholder="Enter your email address">
                    <button type="submit" name="reset-request-submit">Receive new password by email</button>

                </form>

                <?php
                    if (isset($_GET['reset'])) {
                        if ($_GET['reset'] == "success") {
                            echo '<p>Check your email</p>';
                        }
                    }
                ?>
            </section>
        </div>
    </main>
