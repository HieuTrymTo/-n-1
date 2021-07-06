<?php

if (isset($_POST["submit"])) {
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once '../../includes/dbh.inc.php';
    require_once '../../includes/functions.inc.php';

    if (emptyInputSignUp($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: create.php?error=emptyinput");
        exit(); 
    }
    if (invalidUid($username) !== false) {
        header("location: create.php?error=invaliduid");
        exit(); 
    }
    if (invalidEmail($email) !== false) {
        header("location: create.php?error=invalidemail");
        exit(); 
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: create.php?error=passwordsdontmatch");
        exit(); 
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: create.php?error=usernametaken");
        exit(); 
    }

    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, usersLevel) 
    VALUES (?, ?, ?, ?, 'user')";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: index.php?error2=stmtfailed");
        exit(); 
    }
    
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: index.php?error2=none");
    exit(); 

}else {
    header("location: create.php");
    exit();
}
