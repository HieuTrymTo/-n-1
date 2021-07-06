<?php

session_start();

if (isset($_POST["submit"])) {
    
    if (isset($_SESSION["username"])) {
        $name = $_SESSION["username"];
    }

    if (isset($_SESSION["useremail"])) {
        $email = $_SESSION["useremail"];
    }
    if (isset($_SESSION["userid"])) {
        $userid = $_SESSION["userid"];
    }
    $phone = $_POST["number"];
    $location = $_POST["location"];
    $time = $_POST["time"];

    require_once 'dbh.inc.php';

    function uidExists($conn, $name, $email) {
        $sql = "SELECT * FROM appointment_infor WHERE appointmentsName = ? OR appointmentsEmail = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../appointment.php?error=stmtfailed");
            exit(); 
        }
    
        mysqli_stmt_bind_param($stmt, "ss", $name, $email);
        mysqli_stmt_execute($stmt);
    
        $resultData = mysqli_stmt_get_result($stmt);
    
        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }else {
            $result = false;
            return $result;
        }
    
        mysqli_stmt_close($stmt);
    }

    if (empty($phone) || empty($location) || empty($time)) {
        header("location: ../appointment.php?error=emtyinput");
    }
    if(uidExists($conn, $name, $email) !== false) {
        header("location: ../appointment.php?error=alreadybook");
    } else {
        $sql = "INSERT INTO appointment (usersId, appointmentsLocation, appointmentsTime) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
           echo "SQL statement failed1";
        } else {
           mysqli_stmt_bind_param($stmt, "sss", $userid, $location, $time);
           mysqli_stmt_execute($stmt);
           $orderId = mysqli_insert_id($conn);
           $sql = "INSERT INTO appointment_infor (appointmentsId, appointmentsName, appointmentsEmail, appointmentsNumber) VALUES (?, ?, ?, ?);";
           $stmt = mysqli_stmt_init($conn);
           if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed2";
           } else {
              mysqli_stmt_bind_param($stmt, "ssss", $orderId, $name, $email, $phone);
              mysqli_stmt_execute($stmt);
           }
        }
        header("location: ../appointment.php?error=none");
    }
    mysqli_stmt_close($stmt);




}else {
    header("location: ../appointment.php?error=bookingisnotsuccess");
    exit();
}

