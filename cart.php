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
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>

    <div id="nav">
        <div id="header">
            <div class="container">
                <div class="contact-infor">
                    <ul>
                        <li>
                            <a href="">
                                <div class="tag1-icon">
                                    <img src="images/1024px-Flag_of_Vietnam.svg.png" style="width:24px;height:16px">
                                </div>
                                <div class="tag1-text">
                                    <span>Ship to: Hanoi</span>
                                </div>
                            </a> 
                        </li>
                        <li>
                            <a href="help.php">
                                <div class="tag1-icon">
                                    <img src="images/question.png" style="width:16px;height:16px">
                                </div>
                                <div class="tag1-text">
                                    <span>Can we help you?</span>
                                </div>
                            </a> 
                        </li>
                        <li>
                            <div class="tag1-icon">
                                <img src="images/phone.png" style="width:16px;height:16px">
                            </div>
                            <div class="tag1-text">
                                <span>+1.866.DESIREE</span>
                            </div>
                        </li>
                        <li>
                            <a href="" class="tag1-text">Sustainability</a>
                        </li>
                    </ul>
                </div>
                <div class="personal">
                    <ul>
                        <li>
                            <a href="map.php">
                                <div class="tag2-icon">
                                    <img src="images/location.png" style="width:12px;height:16px">
                                </div>
                            </a> 
                        </li>
                        <li>
                            <a href="">
                                <div class="tag2-icon">
                                    <img src="images/heart.png" style="width:16px;height:16px">
                                </div>
                            </a> 
                        </li>
                        <?php
                            if (isset($_SESSION["userlevel"])) {
                                if ($_SESSION["userlevel"] === 'user'){
                                    echo " <li><p><a href = 'profile.php'><div class='tag2-icon'><img src='images/person.png' style='width:16px;height:16px'></div></a></p></li>";
                                    echo " <li><a href = 'includes/logout.inc.php'><div class='tag2-icon' ><img src='images/Logout.png' style='width:16px;height:16px'></div></a></li>";
                    
                                } elseif ($_SESSION["userlevel"] === 'admin'){
                                    echo " <li><p><a href = 'admin/posts/index.php'><div class='tag2-icon'><img src='images/person.png' style='width:16px;height:16px'></div></a></p></li>";
                                    echo " <li><a href = 'includes/logout.inc.php'><div class='tag2-icon' ><img src='images/Logout.png' style='width:16px;height:16px'></div></a></li>";
                                }   
                            }
                            else {
                                echo "<li><div class='tag2-icon' id='tag2-icon-person'><img src='images/person.png' style='width:16px;height:16px'></div></li>";
                            }
                        ?>
                        <!-- <li>
                            <a href="loginForm.html">
                                <div class="tag2-icon" id="tag2-icon-person">
                                    <img src="images/person.png" style="width:16px;height:16px">
                                </div>
                            </a> 
                        </li> -->
                        <li>
                            <?php
                                $count = 0;
                                if(isset($_SESSION['cart'])) {
                                    $count = count($_SESSION['cart']);
                                }
                            ?>
                            <a href="cart.php">
                                <div class="tag2-icon">
                                    <img src="images/bag.png" style="width:14px;height:16px">
                                    <span class="num-cart"><?php echo $count; ?></span>
                                </div>
                            </a> 
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="logo">
                <a style="margin-top: 25px;" href="index.php">DESIREE</a>
            </div>
            <ul class = "menu">
                <li>
                    <a href="product.php?page=1">NEW</a>
                </li>
                <li>
                    <a href="">BESTSELLERS</a>
                </li>
                <li>
                    <p>CLOTHING</p>
                    <div class="new">
                        <div class="newMenu">
                            <ul >
                                <?php

                                    require_once 'includes/dbh.inc.php';

                                    $sql = "SELECT * FROM categories ORDER BY categoriesId;";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        echo "SQL statement failed1";
                                    } else {
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);

                                        
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $name = $row['categoriesName'];
                                            $pid = $row['categoriesParentId'];

                                                if ($pid === 'Clothing') {
                                                    ?>
                                                    <li><a href="product-category.php?category=<?php echo $name?>&page=1"><?php echo $name ?></a></li>
                                                    <?php
                                                }                                      
                                            
                                        }
                                    }
                                ?>                    
                            </ul>
                        </div>
                        <div class="newPic">
                            <img src="images/7160341_1391736.jpg">
                        </div>
                    </div>
                </li>
                <li>
                    <p>DRESSES</p>
                    <div class="new">
                        <div class="newMenu">
                            <ul >
                                <?php

                                    require_once 'includes/dbh.inc.php';

                                    $sql = "SELECT * FROM categories ORDER BY categoriesId;";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        echo "SQL statement failed2";
                                    } else {
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);


                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $name = $row['categoriesName'];
                                            $pid = $row['categoriesParentId'];

                                                if ($pid === 'Dresses') {
                                                    ?>
                                                    <li><a href="product-category.php?category=<?php echo $name?>&page=1"><?php echo $name ?></a></li>
                                                    <?php
                                                }                                      
                                            
                                        }
                                    }
                                ?>                    
                            </ul>
                        </div>
                        <div class="newPic">
                            <img src="images/7145601_1425376.webp">
                        </div>
                    </div>
                </li>
                <li>
                    <p>SWIM</p>
                    <div class="new">
                        <div class="newMenu">
                            <ul >
                                <?php

                                    require_once 'includes/dbh.inc.php';

                                    $sql = "SELECT * FROM categories ORDER BY categoriesId;";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        echo "SQL statement failed3";
                                    } else {
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);


                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $name = $row['categoriesName'];
                                            $pid = $row['categoriesParentId'];

                                                if ($pid === 'Swim') {
                                                    ?>
                                                    <li><a href="product-category.php?category=<?php echo $name?>&page=1"><?php echo $name ?></a></li>
                                                    <?php
                                                }                                      
                                            
                                        }
                                    }
                                ?>                    
                            </ul>
                        </div>
                        <div class="newPic">
                            <img src="images/7204521_1402896.webp">
                        </div>
                    </div>
                </li>
                <li>
                    <p>EXTRAS</p>
                    <div class="new">
                        <div class="newMenu">
                            <ul >
                                <?php

                                    require_once 'includes/dbh.inc.php';

                                    $sql = "SELECT * FROM categories ORDER BY categoriesId;";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        echo "SQL statement failed4";
                                    } else {
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);


                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $name = $row['categoriesName'];
                                            $pid = $row['categoriesParentId'];

                                                if ($pid === 'Extras') {
                                                    ?>
                                                    <li><a href="product-category.php?category=<?php echo $name?>&page=1"><?php echo $name ?></a></li>
                                                    <?php
                                                }                                      
                                            
                                        }
                                    }
                                ?>                    
                            </ul>
                        </div>
                        <div class="newPic">
                            <img src="images/6602961_1209571.jpg">
                        </div>
                    </div>
                </li>
                <li>
                    <p>SALE</p>
                    <div class="new">
                        <div class="newMenu">
                            <ul >
                                <li><a href="product-sale.php?page=1">All Sales</a></li>
                                <li><a href="">DESIREE Deals</a></li>                    
                            </ul>
                        </div>
                        <div class="newPic">
                            <img src="images/5984456_1345716.webp">
                        </div>
                    </div>
                </li>
            </ul>
            <div class="form-search">
                <form action="product-search.php?page=1" method="post">
                    <input id="myInput" type="text" name="search" class="keyword" placeholder="Search &quot;Summer Edition&quot; here" type="search" autocomplete="off" autocorrect="off" autocapitalize="off"  />
                    <button id="myBtn" type="submit" name="submit" class="btn-search">
                            <img src="images/search.png" style="width:18px;height:18px">                  
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php
    
        if (isset($_SESSION["username"])) {
            ?>
            <div id="pay">
                <div class="product">
                    <?php
                        $count = 0;
                        if(isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                        }
                    ?>
                    <div class="text">
                        <h1>MY SHOPPING BAG</h1><p>(<?php echo $count; ?>)</p>
                        <span><a href="index.php">Continue Shopping</a></span>
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
                                                        </div>
                                                        <div class='infor2'>
                                                            <p>Price Per Product: $".$value['PriceSale']."<input class='iprice' type='hidden' name='' value='$value[PriceSale]'></p>
                                                            <div id='productsColor'><p>Color: <div id='Color' style='background-color:".$value['Color'].";'></div></p></p></div>
                                                            <p>Size: ".$value['Size']."</p>   
                                                        </div>
                                                        <div class='infor3'>
                                                            <form action='includes/manage-cart.php' method='post'>
                                                                <input class='iquantity' name='ModQuantity' onchange='this.form.submit()' type='number' value='$value[Quantity]' min='1' max='$value[QuantityTotal]'>
                                                                <input type='hidden' name='ItemName' value='$value[ItemName]'>
                                                            </form>
                                                            <h1 class='itotal'></h1>
                                                        </div>
                                                        <div class='infor4'>
                                                            <form action='includes/manage-cart.php' method='post'>
                                                                <button name='Remove'>Remove</button>
                                                                <input type='hidden' name='ItemName' value='$value[ItemName]'>
                                                            </form>
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
                                                        </div>
                                                        <div class='infor2'>
                                                            <p>Price Per Product: $".$value['Price']."<input class='iprice' type='hidden' name='' value='$value[Price]'></p>
                                                            <div id='productsColor'><p>Color: <div id='Color' style='background-color:".$value['Color'].";'></div></p></p></div>
                                                            <p>Size: ".$value['Size']."</p>   
                                                        </div>
                                                        <div class='infor3'>
                                                            <form action='includes/manage-cart.php' method='post'>
                                                                <input class='iquantity' name='ModQuantity' onchange='this.form.submit()' type='number' value='$value[Quantity]' min='1' max='$value[QuantityTotal]'>
                                                                <input type='hidden' name='ItemName' value='$value[ItemName]'>
                                                            </form>
                                                            <h1 class='itotal'></h1>
                                                        </div>
                                                        <div class='infor4'>
                                                            <form action='includes/manage-cart.php' method='post'>
                                                                <button name='Remove'>Remove</button>
                                                                <input type='hidden' name='ItemName' value='$value[ItemName]'>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            ";
                                        }
                                    }
                                }
                            ?>
                </div>
                <div class="money">
                    <div class="checkout">
                        <h6 id="gtotal"></h6>
                        <h6 id="shipping"></h6>
                        <h6>Tax: $0</h6>
                        <h1 id="total"></h1>
                        <br>
                        <?php
                            if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
                            ?>
                                <a href="checkout.php">
                                    <button>Proceed to checkout</button>
                                </a> 
                            <?php 
                            } else {
                            ?>
                                <a>
                                    <button>Proceed to checkout</button>
                                </a> 
                            <?php    
                            }
                            ?>
                    </div>
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
                <?php
        } else {
            echo "<div class='no-login'><p>'You Must Log In To Buy Products'</p></div>";
        }
        ?>


    

    <div id="footer">
       
       <div class="footer1">
           <h3>DESIREE</h3>
       </div>
       <div class="footer2">
           <ul>
               <li><a href="">Email Sign-Up</a></li> 
               <li><a href="help.php">Contact Us</a></li> 
               <li><a href="">Apps</a></li> 
               <li><a class="fl">Follow Us</a></li> 
               <li><a href="">Legal Notice</a></li> 
               <li><a href="">About Us</a></li> 
               <li><a href="">Location</a></li> 
           </ul>
       </div>
       

       </div>
    </div>
   
    <script src="java/jquery.min.js"></script>


    <script>
        var input = document.getElementById("myInput");
        input.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("myBtn").click();
            }
        });
    </script>

    <script>
        $(function(){
            var scroll = $(document).scrollTop();
            var navHeight = $('#nav').outerHeight();

            $(window).scroll(function(){

                var scrolled = $(document).scrollTop();
                if( scrolled > 70){
                    $('#nav').addClass('animate');
                }else{
                    $('#nav').removeClass('animate');
                }
                
                if( scrolled > scroll){
                    $('#nav').removeClass('sticky');
                }else{
                    $('#nav').addClass('sticky');
                }

                scroll = $(document).scrollTop();
            });
        });
    </script>

    <script>
        var money;
        var gt = 0;
        var ship = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');
        var shipping = document.getElementById('shipping');
        var total = document.getElementById('total');

        function subTotal() {
            gt = 0;

            for (i = 0; i < iprice.length; i++) {
                itotal[i].innerText = 'Subtotal: $' + (iprice[i].value) * (iquantity[i].value);
                gt = gt + (iprice[i].value) * (iquantity[i].value);
            }
            gtotal.innerText = 'Subtotal: $' + gt;
            if (gt < 150 & gt >= 1) {
                ship = 15;
                shipping.innerText = 'Shipping: $' + ship;
            } else if (gt > 150){
                ship = 0;
                shipping.innerText = 'Shipping: $' + ship;
            } else {
                ship = 0;
                shipping.innerText = 'Shipping: $' + ship;
            }

            // ship = 15;
            // shipping.innerText = 'Shipping: $' + ship; 

            money = gt + ship; 

            total.innerText = 'Total: $' + money;
        }

        subTotal();

    </script>
</body>
</html>