<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../imgs/8th.png" type="image/icon type" />
    <title>Reset Password</title>
    <link rel="stylesheet" href="../css/style.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/5b8eaee5c3.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <header class="blog-header py-3">
            <h1 class="headingfont" align="center">
                <img class="mr-1 mb-2" src="../imgs/8th.png" alt="college logo" width="45" height="45" />MyCollege
            </h1>
        </header>
        <div class="jumbotron">

            <?php
            // Import PHPMailer classes into the global namespace
            // These must be at the top of your script, not inside a function
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

            if (isset($_POST['recover-email'])) {
                $email = $_POST['email'];
                include "../database.php";

                $checkEmail = "SELECT * FROM `user` WHERE `Email` = '$email'";

                $stmt = $pdo->prepare($checkEmail);
                $stmt->execute();
                $row = $stmt->fetch();

                if ($row) {
                    $name = $row['Name'];

                    require 'PHPMailer/src/Exception.php';
                    require 'PHPMailer/src/PHPMailer.php';
                    require 'PHPMailer/src/SMTP.php';

                    // Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        $code = uniqid(true);

                        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/UpdatePassword.php?code=$code";

                        //Server settings
                        $mail->isSMTP();                                            // Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = 'botappappbot2@gmail.com';                     // SMTP username
                        $mail->Password   = 'NathanielOngYiiTak';                               // SMTP password
                        $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged ;; PHPMailer::ENCRYPTION_STARTTLS
                        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above ;; 587

                        //Recipients
                        $mail->setFrom('boatppappbot2@gmail.com', 'Test Bot');
                        $mail->addAddress($email, $name);     // Add a recipient
                        $mail->addReplyTo('boatppappbot2@gmail.com', 'Test Bot');

                        // Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Here is the password reset link';
                        $mail->Body    = "<a href='$url'>Click here</a> to reset password, thank you.";
                        $mail->AltBody = "<a href='$url'>Click here</a> to reset password, thank you.";

                        $mail->send();

                        $sql = "INSERT INTO `reset_password` (`ID`, `Code`, `Email`) VALUES (NULL, '$code', '$email')";

                        $stmt = $pdo->prepare($sql);

                        $stmt->execute();

                        echo "<div class='alert alert-info alert-dismissible'>
                        <h4><i class='icon fa fa-check'> An email has been sent to the address, please reset password using the link attached, thank you.</i></h4>
                        <a href='RegisterLogin.php'>Log In</a> now after resetting password through email link.<p>Did not receive link? <a href='javascript:location.reload(true)'>Resend</a> now</p";
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                } else {
                    echo "<div class='alert alert-danger alert-dismissible'>
                        <h4><i class='fas fa-question'> The email is not registered.</i></h4><p>The <strong>$email</strong>  seems to be missing in the database.</p>
                        <a href='RegisterLogin.php'>Register</a> now, <a href='RegisterLogin.php'>log in</a> using another email or <a href='ResetPassword.php'>try again</a>.";
                }

                // if (mysqli_num_rows($query) == 1) {
                //     $code = rand(100, 999);
                //     $message = "You activation link is:http://www.soengsouy.com/Sign-Up/resetpassword.php?email=$email&code=$code";
                //     mail($email, "Send Code", $message);
                //     echo 'Email sent';
                //     $query2 = mysqli_query($con, "UPDATE password SET passsword='$password' WHERE email='$email'")
                //         or die(mysqli_error($con));
                // } else {
                //     $errors = '<div class="alert alert-danger" role="alert">Sorry, Your emails does not exists in our record database</div>';
                // }
            } else {
            ?>
                <p class="p-3 bg-secondary text-light text-center">Please enter your email address used to register your account. We shall assist you by emailing a password reset link to the address once submitted.</p>

                <form method="post" action="ResetPassword.php" class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"> Email: </i>
                    </label>
                    <input class="form-control" id="email" type="email" name="email" placeholder="Enter email to reset password">

                    <input id="reg-btn" class="m-3 d-flex justify-content-center submit-btn text-light fas fa-key" type="submit" name="recover-email" value="&#xf1d8 Submit" />
                </form>
            <?php
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <script src="../js/InputsValidation.js"></script>

    <script src="../js/RegisterLogin.js"></script>
</body>

</html>