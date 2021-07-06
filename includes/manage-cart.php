<?php

session_start();

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    if (isset($_SESSION["username"])) {
        if(isset($_POST['Add-to-cart'])) {
            if (isset($_SESSION['cart'])) {
                $myitems = array_column($_SESSION['cart'], 'ItemName');
        
                if (in_array($_POST['ItemName'], $myitems)) {
                    header("Location: ../product.php?page=$page&item=alreadyadded");
                } else {
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('ItemId'=>$_POST['ItemId'], 'ItemName'=>$_POST['ItemName'], 'Price'=>$_POST['Price'], 'PriceSale'=>$_POST['PriceSale'], 'Sale'=>$_POST['Sale'], 'Quantity'=>1, 'Color'=>$_POST['Color'], 'Size'=>$_POST['Size'], 'Picture'=>$_POST['Img'], 'QuantityTotal'=>$_POST['QuantityTotal']);
                    header("Location: ../product.php?page=$page&item=added");
                }
            } else {
                $_SESSION['cart'][0] = array('ItemId'=>$_POST['ItemId'], 'ItemName'=>$_POST['ItemName'], 'Price'=>$_POST['Price'],  'PriceSale'=>$_POST['PriceSale'], 'Sale'=>$_POST['Sale'] ,'Quantity'=>1, 'Color'=>$_POST['Color'], 'Size'=>$_POST['Size'], 'Picture'=>$_POST['Img'], 'QuantityTotal'=>$_POST['QuantityTotal']);
                header("Location: ../product.php?page=$page&item=added");
            }
        }
        
        if(isset($_POST['Remove'])) {
            foreach($_SESSION['cart'] as $key => $value) {
                if($value['ItemName'] == $_POST['ItemName']) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    header("Location: ../cart.php?item=removed");
                }
            }
        }

        if(isset($_POST['ModQuantity'])) {
            foreach($_SESSION['cart'] as $key => $value) {
                if($value['ItemName'] == $_POST['ItemName']) {
                    $_SESSION['cart'][$key]['Quantity'] = $_POST['ModQuantity'];
                    header("Location: ../cart.php");
                }
            }
        }

    } else{
        header("Location: ../product.php?page=$page&error=youhavenotlogin");
    }

} else {
    if (isset($_SESSION["username"])) {
        if(isset($_POST['Add-to-cart'])) {
            if (isset($_SESSION['cart'])) {
                $myitems = array_column($_SESSION['cart'], 'ItemName');
        
                if (in_array($_POST['ItemName'], $myitems)) {
                    header("Location: ../product.php?page=1&item=alreadyadded");
                } else {
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('ItemId'=>$_POST['ItemId'], 'ItemName'=>$_POST['ItemName'], 'Price'=>$_POST['Price'], 'PriceSale'=>$_POST['PriceSale'], 'Sale'=>$_POST['Sale'], 'Quantity'=>1, 'Color'=>$_POST['Color'], 'Size'=>$_POST['Size'], 'Picture'=>$_POST['Img'], 'QuantityTotal'=>$_POST['QuantityTotal']);
                    header("Location: ../product.php?page=1&item=added");
                }
            } else {
                $_SESSION['cart'][0] = array('ItemId'=>$_POST['ItemId'], 'ItemName'=>$_POST['ItemName'], 'Price'=>$_POST['Price'], 'PriceSale'=>$_POST['PriceSale'], 'Sale'=>$_POST['Sale'], 'Quantity'=>1, 'Color'=>$_POST['Color'], 'Size'=>$_POST['Size'], 'Picture'=>$_POST['Img'], 'QuantityTotal'=>$_POST['QuantityTotal']);
                header("Location: ../product.php?page=1&item=added");
            }
        }
        
        if(isset($_POST['Remove'])) {
            foreach($_SESSION['cart'] as $key => $value) {
                if($value['ItemName'] == $_POST['ItemName']) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    header("Location: ../cart.php?item=removed");
                }
            }
        }

        if(isset($_POST['ModQuantity'])) {
            foreach($_SESSION['cart'] as $key => $value) {
                if($value['ItemName'] == $_POST['ItemName']) {
                    $_SESSION['cart'][$key]['Quantity'] = $_POST['ModQuantity'];
                    
                    header("Location: ../cart.php");
                }
            }
        }

    } else{
        header("Location: ../product.php?page=1e&error=youhavenotlogin");
    }
}
