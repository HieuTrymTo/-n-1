<?php

session_start();

if(isset($_POST['purchase']))
{
    require_once 'dbh.inc.php';

    if (isset($_SESSION["username"])) {
        $name = $_SESSION["username"];
    }

    if (isset($_SESSION["useremail"])) {
        $email = $_SESSION["useremail"];
    }
    if (isset($_SESSION["userid"])) {
        $userid = $_SESSION["userid"];
    }

    $number = $_POST['phonenumber'];
    $address = $_POST['address'];
    $shipping = $_POST['shipping_mode'];
    $payment = $_POST['pay_mode'];
    $total = $_GET['total'];
    $process = 'In Process';
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $date = date("m/d/Y h:i A");
    $final = strtotime($date);
    $time_posted = date("Y-m-d H:i:s", $final);

    $sql = "INSERT INTO order_manager (usersId, ordersDelivery, ordersPayment, ordersValue, ordersProcess, ordersTime) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
       echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "ssssss", $userid, $shipping, $payment, $total, $process, $time_posted);
        mysqli_stmt_execute($stmt);
        $orderId = mysqli_insert_id($conn);
        $sql = "INSERT INTO order_infor (ordersId, ordersName, ordersEmail, ordersPhoneNumber, ordersAddress) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "sssss", $orderId, $name, $email, $number, $address);
            mysqli_stmt_execute($stmt);
            $sql = "INSERT INTO order_item (ordersId, productsId, ordersItems, ordersPrice, ordersQuantity) VALUES (?, ?, ?, ?, ?);";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
             echo "SQL statement failed2";
            } else {
                 mysqli_stmt_bind_param($stmt, "sssss", $orderId, $itemId, $itemName, $price, $quantity);
                 foreach($_SESSION['cart'] as $key => $value) {
                     $itemId = $value['ItemId'];
                     $itemName = $value['ItemName'];
                     $price = $value['Price'];
                     $quantity = $value['Quantity'];
                     mysqli_stmt_execute($stmt);
                 }
                 $sql = "UPDATE product SET productsQuantity=? WHERE productsId=?";
                 if (!mysqli_stmt_prepare($stmt, $sql)) {
                 echo "SQL statement failed3";
                 } else {
                     mysqli_stmt_bind_param($stmt, "ss", $quantityUpdate, $itemId);
                     foreach($_SESSION['cart'] as $key => $value) {
                         $quantityUpdate = $value['QuantityTotal'] - $value['Quantity'];
                         $itemId = $value['ItemId'];
                         mysqli_stmt_execute($stmt);
                     }
                 }
                 unset($_SESSION['cart']);
                 header("Location: ../index.php");
             }
        }
    }
}

