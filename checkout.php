<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/checkout.css">
</head>
<body>
    <?php
        $gt = 0;
        foreach($_SESSION['cart'] as $key => $value) {
            if ($value['Sale'] == 'Yes') {
                $subtotal = $value['PriceSale'] * $value['Quantity'];
                $gt = $gt + $value['PriceSale'] * $value['Quantity'];
            } else {
                $subtotal = $value['Price'] * $value['Quantity'];
                $gt = $gt + $value['Price'] * $value['Quantity'];
            }                           
        }
        if ($gt < 150 && $gt >= 1) {
            $ship = 15;
        } else if ($gt > 150) {
            $ship = 0;
        } else {
            $ship = 0;
        }
            $total = $gt + $ship;
        ?>
    <div class="header">
        <div class="logo">
            <a href="index.php">DESIREE</a>
        </div>
        <div class="help">
            <p>Check Out</p>
        </div>
    </div>

    <div id="checkout">
        <div class="checkout-inform">
            <div class="infor">
                <form class="" action="includes/purchase.php?total=<?php echo $total?>" method="POST">
                    <div class="identification">
                        <h3>1.IDENTIFICATION</h3>
                        <label class="form-field">Your Name Is: </label>
                        <?php
                            if (isset($_SESSION["username"])) {
                                echo " <h4>". $_SESSION["username"] . " </h4>";
                            }
                            else{
                        
                            }
                        ?>
                        <label class="form-field">Your Email Is: </label>
                        <?php
                            if (isset($_SESSION["useremail"])) {
                                echo " <h4>". $_SESSION["useremail"] . " </h4>";
                            }
                            else{
                        
                            }
                        ?>
                        <label class="form-field">Your Phone Number:</label>
                        <input type="text" name="phonenumber" class="input-field" required>
                        <label class="form-field">Your Address:</label>
                        <input type="text" name="address" class="input-field" required>
                    </div>

                    <div class="shipping">
                        <h3>2.DELIVERY OPTIONS</h3>
                        <input type="checkbox" name="shipping_mode" id="Standard" name="pay" value="Standard" required>
                        <label for="Standard"> Standard: </label>
                        <span>2-5 Business days | Complimentary</span>
                    </div>

                    <div class="pay">
                        <h3>3.PAYMENT</h3>
                        <input type="checkbox" name="pay_mode" id="COD" name="pay" value="COD" required>
                        <label for="COD"> Cash On Delivery</label>
                    </div>
                        
                    <button type="submit" name="purchase" class="submit-btn">Add product</button>

                </form>
            </div>
            <div class="product">
                <div class="show-product">
                    <div class="product-name">
                        <?php
                            $count = 0;
                            if(isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                            }
                        ?>
                        <div class="text">
                            <h3>MY SHOPPING BAG</h3><p>(<?php echo $count; ?>)</p>
                            <span><a href="cart.php">Modify Cart</a></span>
                        </div>
                        <div class='infor3'>

                                <p class='itotal'>Subtotal: $<?php echo $gt ?></p>
                                <p class='itotal'>Shipping: $<?php echo $ship ?></p>
                                <h4 class='itotal'>Total: $<?php echo $total ?></h4>
                        </div>
                            <?php
                                if (isset($_SESSION['cart'])) {
                                    foreach($_SESSION['cart'] as $key => $value) {
                                        $sr = $key + 1;
                                        if ($value['Sale'] == 'Yes') {
                                            echo "
                                                <div class='order'>
                                                    <div class='pic'>
                                                        <img src='images/gallery/".$value['Picture']."'>
                                                    </div>
                                                    <div class='infor'>
                                                        <div class='infor1'>
                                                            <h1>".$value['ItemName']."</h1>
                                                            <p>$".$value['PriceSale']* $value['Quantity']."<input class='iprice' type='hidden' name='' value='$value[Price]* $value[Quantity]'></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            ";
                                        } else {
                                            echo "
                                                <div class='order'>
                                                    <div class='pic'>
                                                        <img src='images/gallery/".$value['Picture']."'>
                                                    </div>
                                                    <div class='infor'>
                                                        <div class='infor1'>
                                                            <h1>".$value['ItemName']."</h1>
                                                            <p>$".$value['Price']* $value['Quantity']."<input class='iprice' type='hidden' name='' value='$value[Price]* $value[Quantity]'></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            ";
                                        }
                                       
                                    }
                                    
                                }
                                ?>

                    </div>
                </div>
                <div class="method">
                    <a href="">
                        <div class="icon">
                            <img src="images/payment.png" style="width: 48px; height:48px">
                            <div class="text">
                                <p>PAYMENT</p><span>Credit card, debit card, PayPal, Apple Pay</span>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="icon">
                            <img src="images/Shipping.png" style="width: 48px; height:28px">
                            <div class="text">
                                <p>SHIPPING AND DELIVERY</p><span>Complimentary Standard Shipping</span>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="icon">
                            <img src="images/exchange.png" style="width: 40px; height:48px">
                            <div class="text">
                                <p>RETURNS & EXCHANGES</p><span>Complimentary</span>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="icon">
                            <img src="images/pack.png" style="width: 40px; height:40px">
                            <div class="text">
                                <p>PACKAGING</p><span>Contemporary and eco-friendly wrapping inspired by our Heritage </span>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>


    <div id="footer">
        <div class="footer1">
            <h3>DESIREE</h3>
        </div>
        <div class="footer2">
            <ul>
                <li><a href="">Email Sign-Up</a></li> 
                <li><a href="">Contact Us</a></li> 
                <li><a href="">App</a></li> 
                <li><a href="">Follow Us</a></li> 
                <li><a href="">Legal Notice</a></li> 
                <li><a href="">Sitemap</a></li> 
            </ul>
        </div>
    </div>

</body>
</html>