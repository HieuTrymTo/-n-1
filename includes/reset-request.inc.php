<?php

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;


if (isset($_POST["reset-request-submit"])) {
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/phpproject/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    require 'dbh.inc.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExprires) 
    VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    }
    else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

 

    
    $to = $userEmail;

    $subject = 'Reset your password for DESIREE';

    $message = '<p>We recieved a password reset request. THe link to reset your password is below. If you did not make this request, you can ignore this email</p>';
    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href="'. $url .'">' . $url. '</a></p>';

    $headers = "From: DESIREE <comatkhau222@gmail.com>\r\n";
    $headers .= "Reply-To: comatkhau222@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    // mail($to, $subject, $message, $headers);

    // header("Location: ../forgot-password.php?reset=success");

    require_once '../PHPMailer/PHPMailer.php';
    require_once '../PHPMailer/SMTP.php';
    require_once '../PHPMailer/Exception.php';
    require_once '../PHPMailer/POP3.php';
    require_once '../PHPMailer/OAuth.php';
    
    $mail = new PHPMailer(true);


    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = "587" ;
    $mail->Username = "comatkhau222@gmail.com";
    $mail->Password = 'ilovedota2';
        

    //email setting
    $mail->header = $headers;
    $mail->Subject = $subject;
    $mail->setFrom("comatkhau222@gmail.com");
    $mail->isHTML(true);
    $mail->Body = $message;
    // $mail->Body = '<a href="'. $url .'">' . $url. '</a></p>';
    $mail->addAddress("comatkhau222@gmail.com");

    if ($mail->send()) {
        header("Location: ../index.php?reset=success");
        // echo "dcm";

    }else {
        echo "Error!";
    }

    $mail->smtpClose();

    
    // header("Location: ../index.php?reset =success");


}
else {
    // header("Location: ../index.php");
    echo "đcm";

}