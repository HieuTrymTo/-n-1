<?php

if (isset($_POST["submit"])) {
    
    $name = $_POST["name"];
    $parentid = $_POST["pid"];

    require_once '../../includes/dbh.inc.php';

    if (empty($name)) {
        header("Location: create.php?error=emptyinput");
    }else {
        $sql = "INSERT INTO categories (categoriesName, parentId) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: index.php?error=stmtfailed");
            exit(); 
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $name, $parentid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: index.php?erroradd=none");
            exit(); 
        }
    }

}else {
    header("location: create.php");
    exit();
}
