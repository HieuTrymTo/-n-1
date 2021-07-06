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
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
    
    <?php
        if (isset($_SESSION["username"])) {
            if($_SESSION["userlevel"] === 'admin') {
                echo " <div id='hello'><p>Welcome admin ". $_SESSION["username"] . " </p></div>";
            }else{
                echo " <div id='hello'><p>Welcome ". $_SESSION["username"] . " to official website of DESIREE</p></div>";
            }

        }
        else{
    
        }
    ?>

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

    <div class="product-card">
        <?php
            require_once 'includes/dbh.inc.php';
            
            $id = $_GET['id'];

            $sql = "SELECT * FROM product WHERE productsId=$id";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed5";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);


                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['productsOnsale'] == 'Yes') {
                        if ($row['productsQuantity'] >= 1) {
                        ?>
                            <form action='includes/manage-cart-for-detail.php?id=<?php echo $id?>' method='post'>
                        <?php 
                        } else {
                            ?>
                            <form action='' method='post'>
                        <?php 
                        }
                        ?>
                        <div class='product'>
                            <div class='detail' style='background-image:url(images/gallery/<?php echo $row['productsImg']?>)'></div>
                            <div class='detail-product'>
                                <div id='productsName'><h2><?php echo $row['productsName']?></h2></div>
                                <div id='productsPrice'><p>$<?php echo $row['productsSalePrice']?>&emsp;<span style='text-decoration: line-through'>$<?php echo $row['productsPrice']?></span></p></div>
                                <div id='round'>
                                    <div id='productsColorSize'><p><h4>Size:</h4><div id='size'><p><?php echo $row['productsSize']?></p></div></p><a href=''><img src='images/chart.png'>Size Chart</a></div>
                                    <div id='color'><p><h4>Color:</h4> </p><div id='productsColor' style='background-color:<?php echo $row['productsColor']?>;'></div></div>
                                    <?php 
                                        if ($row['productsQuantity'] > 10) {
                                            ?>
                                                <div id='middle'><button type='submit' name='Add-to-cart' class='text'>Add To Cart</button><span><button type='submit' name='Add-to-wishlist'>+ Add To Wishlist</button></span><p><img src='images/Shipping.png'>Free International Shipping on orders over $150 with code WorldWide! <a href=''>See More</a></p></div>
                                            <?php
                                        } elseif ($row['productsQuantity'] >=1 && $row['productsQuantity'] <= 10) {
                                            ?>
                                                <p style="margin-top: 25px;">"Only <?php echo $row['productsQuantity'] ?> left!"</p>
                                                <div id='middle'><button type='submit' name='Add-to-cart' class='text'>Add To Cart</button><span><button type='submit' name='Add-to-wishlist'>+ Add To Wishlist</button></span><p><img src='images/Shipping.png'>Free International Shipping on orders over $150 with code WorldWide! <a href=''>See More</a></p></div>
                                            <?php
                                        } else {
                                            ?>
                                                <p style="margin-top: 25px;">"Out of stock"!</p>
                                                <div id='middle'><button class='text' style="opacity: 0.5;">Add To Cart</button><span><button type='submit' name='Add-to-wishlist'>+ Add To Wishlist</button></span><p><img src='images/Shipping.png'>Free International Shipping on orders over $150 with code WorldWide! <a href=''>See More</a></p></div>
                                            <?php
                                        }
                                    ?>
                                    
                                </div>
                                <div id='describes'><h4>Description</h4><p><?php echo $row['productsDesc']?></p></div>
                            </div>
                            <input type='hidden' name='ItemId' value='<?php echo $row['productsId']?>'>
                            <input type='hidden' name='ItemName' value='<?php echo $row['productsName']?>'>
                            <input type='hidden' name='Price' value='<?php echo $row['productsPrice']?>'>
                            <input type='hidden' name='PriceSale' value='<?php echo $row['productsSalePrice']?>'>
                            <input type='hidden' name='Size' value='<?php echo $row['productsSize']?>'>
                            <input type='hidden' name='Sale' value='<?php echo $row['productsOnsale']?>'>
                            <input type='hidden' name='Color' value='<?php echo $row['productsColor']?>'>
                            <input type='hidden' name='Img' value='<?php echo $row['productsImg']?>'>
                            <input type='hidden' name='QuantityTotal' value='<?php echo $row['productsQuantity']?>'>
                        </div></form>;
                        <?php
                    } else {
                        if ($row['productsQuantity'] >= 1) {
                        ?>
                            <form action='includes/manage-cart-for-detail.php?id=<?php echo $id?>' method='post'>
                        <?php 
                        } else {
                            ?>
                            <form action='' method='post'>
                        <?php 
                        }
                        ?>
                        <div class='product'>
                            <div class='detail' style='background-image:url(images/gallery/<?php echo $row['productsImg']?>)'></div>
                            <div class='detail-product'>
                                <div id='productsName'><h2><?php echo $row['productsName']?></h2></div>
                                <div id='productsPrice'><p>$<?php echo $row['productsPrice']?></p></div>
                                <div id='round'>
                                    <div id='productsColorSize'><p><h4>Size:</h4><div id='size'><p><?php echo $row['productsSize']?></p></div></p><a href=''><img src='images/chart.png'>Size Chart</a></div>
                                    <div id='color'><p><h4>Color:</h4> </p><div id='productsColor' style='background-color:<?php echo $row['productsColor']?>;'></div></div>
                                    <?php 
                                        if ($row['productsQuantity'] > 10) {
                                            ?>
                                                <div id='middle'><button type='submit' name='Add-to-cart' class='text'>Add To Cart</button><span><button type='submit' name='Add-to-wishlist'>+ Add To Wishlist</button></span><p><img src='images/Shipping.png'>Free International Shipping on orders over $150 with code WorldWide! <a href=''>See More</a></p></div>
                                            <?php
                                        } elseif ($row['productsQuantity'] >=1 && $row['productsQuantity'] <= 10) {
                                            ?>
                                                <p style="margin-top: 25px;">"Only <?php echo $row['productsQuantity'] ?> left!"</p>
                                                <div id='middle'><button type='submit' name='Add-to-cart' class='text'>Add To Cart</button><span><button type='submit' name='Add-to-wishlist'>+ Add To Wishlist</button></span><p><img src='images/Shipping.png'>Free International Shipping on orders over $150 with code WorldWide! <a href=''>See More</a></p></div>
                                            <?php
                                        } else {
                                            ?>
                                                <p style="margin-top: 25px;">"Out of stock!"</p>
                                                <div id='middle'><button class='text' style="opacity: 0.5;">Add To Cart</button><span><button type='submit' name='Add-to-wishlist'>+ Add To Wishlist</button></span><p><img src='images/Shipping.png'>Free International Shipping on orders over $150 with code WorldWide! <a href=''>See More</a></p></div>
                                            <?php
                                        }
                                    ?>
                                    
                                </div>
                                <div id='describes'><h4>Description</h4><p><?php echo $row['productsDesc']?></p></div>
                            </div>
                            <input type='hidden' name='ItemId' value='<?php echo $row['productsId']?>'>
                            <input type='hidden' name='ItemName' value='<?php echo $row['productsName']?>'>
                            <input type='hidden' name='Price' value='<?php echo $row['productsPrice']?>'>
                            <input type='hidden' name='PriceSale' value='<?php echo $row['productsSalePrice']?>'>
                            <input type='hidden' name='Size' value='<?php echo $row['productsSize']?>'>
                            <input type='hidden' name='Sale' value='<?php echo $row['productsOnsale']?>'>
                            <input type='hidden' name='Color' value='<?php echo $row['productsColor']?>'>
                            <input type='hidden' name='Img' value='<?php echo $row['productsImg']?>'>
                            <input type='hidden' name='QuantityTotal' value='<?php echo $row['productsQuantity']?>'>
                        </div></form>;
                        <?php
                    }
                }
            }
        ?>
    </div>

    <div id="alsolove">
        <h1>You May Also Love</h1>
        <div class="images">
            <?php 
                require_once 'includes/dbh.inc.php';

                $sql = "SELECT * FROM product ORDER BY RAND() LIMIT 5;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL statement failed5";
                } else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);


                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['productsOnsale'] == 'Yes') {
                            echo 
                            "<a href='product-detail.php?id=".$row['productsId']."'>
                                <div class='luv'>
                                    <div class='detail' style='background-image:url(images/gallery/".$row['productsImg'].")'></div>
                                    <div class='productsName'><h2>".$row['productsName']."</h2></div>
                                    <div class='productsPrice'><p>$".$row['productsSalePrice']."&emsp;<span style='text-decoration: line-through'>$".$row['productsPrice']."</span></p></div>
                                </div>
                            </a>";
                        } else {
                            echo 
                            "<a href='product-detail.php?id=".$row['productsId']."'>
                                <div class='luv'>
                                    <div class='detail' style='background-image:url(images/gallery/".$row['productsImg'].")'></div>
                                    <div class='productsName'><h2>".$row['productsName']."</h2></div>
                                    <div class='productsPrice'><p>$".$row['productsPrice']."</p></div>
                                </div>
                            </a>";

                        }
                    }
                        
                }
            ?>
        </div>
    </div>

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


   <div id="login">
       <div class="login-background">

       </div>
       <div class="login-form">
           <div class="identification">
               <div class="identification1">
                   <h1>IDENTIFICATION</h1>
               </div>
               <div class="x">
                   <img src="images/x.png" alt="" style="width:16px;height:16px">
               </div>
           </div>
           
           <div class="inside-login-form">
               <section class="form-sign-in">
                   <h2>MEMBERS PLEASE SIGN IN</h2>
                   <div class = "error">
                       <?php
                           if (isset($_GET["error"])) {
                               if ($_GET["error"] == "emtyinput") {
                                   echo "<p>'Fill in all fields!'</p>";
                               }
                               elseif ($_GET["error"] == "wronguserid") {
                                   echo "<p>'User id don't exist!'</p>";
                               }
                               elseif ($_GET["error"] == "wrongpwd") {
                                   echo "<p>'Incorrect password!'</p>";
                               }
                           }
                       ?>
                       <!-- <?php
                           if (isset($_GET["newpwd"])) {
                               if ($_GET["newpwd"] == "passwordupdated") {
                                   echo '<p class ="resetsuccess">Your password has been reset!</p>';
                               }
                           }
                       ?> -->
                   </div>
                   
                   <form class="form-sign-in2" action="includes/signin.inc.php" method="POST">
                       <label class="form-field">Login*</label>
                       <input type="text" name="uid" class="input-field" required>
                       <label class="form-field">Password*</label>
                       <input type="password" name="pwd" class="input-field" required>
                       <a href="forgot-password.php">
                           <button type="button" class="forgot-pass" id="forgot-pass">Forgot your password?</button>
                       </a>
                       <button type="submit" name="submit" class="submit-btn">Sign In</button>
               </section>
           </div>
           <div class="inside-login-form">
               <section class="form-sign-in">
                   <h2>DON'T HAVE AN ACCOUNT</h2>
                   <P>Enjoy added benefits and richer experience by creating a personal account.</P>
                   <a href="loginForm.php">
                       <p type="submit" class="submit-btn1">Create My DERISEE Account</p>
                   </a>   
               </section>
           </div>
           
       </div>
   </div>


   <script src="java/jquery.min.js"></script>

   <script>
       var ident = '3';
       $('select option[value="' + ident +'"]').prop("selected", true);
   </script>

   <script>
       $(document).ready(function(){
           $("#tag2-icon-person").click(function(){
               $("#login").addClass('show');
           });
           $(".login-background,.x,.forgot-background").click(function(){
               $("#login").removeClass('show');
           });

       });
   </script>



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
   
</body>
</html>

