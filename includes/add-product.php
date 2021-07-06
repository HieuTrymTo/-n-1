<?php

if (isset($_POST['submit'])) {

    $newfileName =  $_POST['filename'];
    if (empty($newfileName)) {
        $newfileName = "gallery";
    } else {
        $newfileName = strtolower(str_replace(" ", "-", $newfileName));
    }

    $productName = $_POST['name'];
    $productDesc = $_POST['desc'];
    $productPrice = $_POST['price'];
    $productCategory = $_POST['category'];
    $productSalePrice =$_POST['saleprice'];
    $productColor =$_POST['color'];
    $productSize =$_POST['size'];
    $productSaleState =$_POST['salestate'];
    $productQuantity =$_POST['quantity'];


    $file = $_FILES['image'];

    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError= $file["error"];
    $fileSize = $file["size"];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png", "webp");

    if (in_array($fileActualExt, $allowed)) {
        if ( $fileError === 0) {
            if ($fileSize < 20000000) {
                $imageFullName = $newfileName . "." . uniqid("", true) . "." . $fileActualExt; 
                $fileDestination = "../images/gallery/" .$imageFullName;

                move_uploaded_file($fileTempName, $fileDestination);

                require_once '../includes/dbh.inc.php';

                if (empty($productName) || empty($productDesc) || empty($productPrice) || empty($productSalePrice) || empty($productColor) || empty($productSize) || empty($productQuantity)) {
                    header("Location: ../admin/posts/create.php?upload = empty");
                    exit();
                } else {
                    $sql = "SELECT * FROM product;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement failed1";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        $setImgOrder = $rowCount + 1;

                        $sql = "INSERT INTO product (productsName, categoriesId, productsDesc, productsImg, productsPrice, productsSalePrice, productsColor, productsSize, productsOnsale, productsQuantity, productsOrder) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                         if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement failed2";
                        } else {
                            mysqli_stmt_bind_param($stmt, "sssssssssss", $productName, $productCategory, $productDesc,  $imageFullName, $productPrice, $productSalePrice, $productColor, $productSize, $productSaleState, $productQuantity, $setImgOrder);
                            mysqli_stmt_execute($stmt);

                           

                            header("Location: ../admin/posts/index.php?upload=success");
                            
                        }

                    }
                }
            } else {
                echo "You had an error1";
            }
        } else {
            echo "You had an error2";
        }
    } else {
        echo "You need to upload a proper file type!";
    }

}