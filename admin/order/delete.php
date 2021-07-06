<?php

    require_once '../../includes/dbh.inc.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM order_item WHERE ordersId = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: index.php?error=emtyinput");
        exit(); 
    } else {
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $sql = "DELETE FROM order_infor WHERE ordersId = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: index.php?error=emtyinput");
            exit(); 
        } else {
            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);
            $sql = "DELETE FROM order_manager WHERE ordersId = ?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: index.php?error=emtyinput");
                exit(); 
            } else {
                mysqli_stmt_bind_param($stmt, "s", $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                header ("location: index.php?error=none");
            }
        }
    }

