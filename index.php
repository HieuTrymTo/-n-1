<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/swiper.css">
    <title>DESIREE</title>
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
                <a href="index.php">DESIREE</a>
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

                                    $sql = "SELECT * FROM categories WHERE parentId='1' ORDER BY categoriesId;";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        echo "SQL statement failed1";
                                    } else {
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);

                                        
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $pid = $row['parentId'];
                                            $id = $row['categoriesId'];
                                            $name = $row['categoriesName'];
                                                ?>
                                                <li><a href="product-category.php?category=<?php echo $id?>&page=1"><?php echo $name ?></a></li>
                                                <?php                                                                               
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

                                    $sql = "SELECT * FROM categories WHERE parentId='2' ORDER BY categoriesId;";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        echo "SQL statement failed1";
                                    } else {
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);

                                        
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $pid = $row['parentId'];
                                            $id = $row['categoriesId'];
                                            $name = $row['categoriesName'];
                                                ?>
                                                <li><a href="product-category.php?category=<?php echo $id?>&page=1"><?php echo $name ?></a></li>
                                                <?php                                                                               
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

                                    $sql = "SELECT * FROM categories WHERE parentId='3' ORDER BY categoriesId;";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        echo "SQL statement failed1";
                                    } else {
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);

                                        
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $pid = $row['parentId'];
                                            $id = $row['categoriesId'];
                                            $name = $row['categoriesName'];
                                                ?>
                                                <li><a href="product-category.php?category=<?php echo $id?>&page=1"><?php echo $name ?></a></li>
                                                <?php                                                                               
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

                                    $sql = "SELECT * FROM categories WHERE parentId='4' ORDER BY categoriesId;";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        echo "SQL statement failed1";
                                    } else {
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);

                                        
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $pid = $row['parentId'];
                                            $id = $row['categoriesId'];
                                            $name = $row['categoriesName'];
                                                ?>
                                                <li><a href="product-category.php?category=<?php echo $id?>&page=1"><?php echo $name ?></a></li>
                                                <?php                                                                               
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
                    <button id="myBtn" type="submit" name="submit" class="btn-search">
                            <img src="images/search.png" style="width:18px;height:18px">                  
                    </button>
                    <input id="myInput" type="text" name="search" class="keyword" placeholder="Search &quot;Summer Edition&quot; here" type="search" autocomplete="off" autocorrect="off" autocapitalize="off"  />
                </form>
            </div>
        </div>
    </div>

    <div id="banner">
         <!-- Swiper -->
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="./images/FF452831-5FEC-412A-B43B-29A3C5B8FA63.jpg">
            </div>
            <div class="swiper-slide" style="background-image: url('./images/bojana-ugresić-true-romance-fashion-campaign-shooting.jpg');">
              <!-- <img src="./images/feature-image-so-haute-right-now-how-louis-vuitton-are-killing-it-on-social-media-2.jpeg"> -->
            </div>

          </div>
          <!-- Add Pagination  -->
          <div class="swiper-pagination swiper-pagination-white"></div>
           <!-- Add Arrows  -->
          <div class="swiper-button-next swiper-button-white"></div>
          <div class="swiper-button-prev swiper-button-white"></div>
        </div>
    </div>
    
    <div id="feature">
        <div class="slice">
            <div class="left">
                <h2> BOOK AN APPOINTMENT</h2>
                <p>Now Available:  Book Your Next Virtual or In-Store Appointment</p>
                <?php
                    if (isset($_SESSION["username"])) {
                        ?>
                        <a href="appointment.php">
                            <button class="btn">Book Now</button>
                        </a>
                        <?php
                    }
                    else{
                        ?>
                        <a>
                            <button class="btn">Book Now</button>
                        </a>
                        <?php
                    }
                ?>
            </div>
            <img src="images/AW2020.jpg" alt="">
            
        </div>
        <div class="banner">
            <a href="">
                <div class="bannerLeft">
                    <div class="left">
                        <img src="images/banner4.jpg" alt="">
                    </div>
                    <div class="textLeft">
                        <h2>SPLIT ON TO SUMMER</h2>
                    </div>
                </div>
            </a>

            <div class="overviewRight">
                <a href="">
                    <div class="scent">
                        <div class="summer">
                            <h2>SUNNY DAYS AHEAD</h2>
                            <p>Try On Our Collection of Sunglasses Virtually</p>
                        </div>     
                        <a href="product-category.php?category=34&page=1">           
                            <button class="btn">Shop Sunglasses</button>
                        </a>
                    </div>    
                </a>
                <a href="">
                    <div class="bannerRight">
                        <div class="right">
                            <img src="images/banner3.jpg" alt="">
                        </div>
                        
                        <div class="textRight">
                            <h2>SUMMER MUST-HAVES</h2>
                        </div>
                    </div>   
                </a>
            </div>
            
        </div>
        <div class="content">
            <div class="title">
                <h2>NEW ARRIVALS YOU'LL LOVE</h2>
            </div>
            <div class="layer1">         
                <a href="">
                    <div class="product">
                        <img src="images/1.jpg">
                    </div>  
                </a>
                <a href="">
                    <div class="product">
                        <img src="images/2.jpg">
                    </div>
                </a>
                <a href="">
                    <div class="product">
                        <img src="images/3.jpeg">
                    </div>
                </a>
                <a href="">
                    <div class="product">
                        <img src="images/4.jpeg">
                    </div>
                </a>
            </div>
            <div class="layer2">
                <button class="btn">Shop Now</button>
            </div>
        </div>
       

    </div>

    <!-- <div id="follow">
        <div class="follow1">
            <h3>Follow US</h3>
        </div>
        <div class="follow2">
            <ul>
                <li><a href="">Facebook</a></li> 
                <li><a href="">Instagram</a></li> 
                <li><a href="">Twitter</a></li> 
                <li><a href="">Youtube</a></li> 
                <li><a href="">Pinteres</a></li>  
            </ul>
        </div>
        <div class="follow3"></div>
       
    </div> -->

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

    <!-- <div id="forgot-pwd">
        <div class="forgot-background">

        </div>
        <div class="forgot-form">
            <div class="identification">
                <div class="identification1">
                    <h1>IDENTIFICATION</h1>
                </div>
                <div class="x">
                    <img src="images/x.png" alt="" style="width:16px;height:16px">
                </div>
            </div>
            
            <div class="inside-forgot-form">
                <section class="form-forgot">
                    <h2>CHANGE YOUR PASSWORD</h2>

                    <p>In order to reset your password, please provide us your email. We will send you an email momentarily.</p>

                    <form class="form-forgot" action="includes/reset-request.inc.php" method="POST">                      
                        <label class="form-field">Email*</label>
                        <input type="email" name="email1" class="email" required>
                        <div class="send-field">
                            <button type="submit" name="" class="cancel">Cancel</button>
                            <button type="submit" name="reset-request-submit" class="send">Send</button>  
                        </div>
                    </form>
                    <?php
                        // if (isset($_GET["reset"])) {
                        //     if ($_GET["reset"] == "success") {
                        //         echo '<p class ="resetsuccess">Check your e-mail</p>';
                        //     }
                        // }
                    ?>
                </section>
            </div> 
            <div class="inside-forgot-form ">
                <section class="form-forgot">
                    <h2>DON'T HAVE AN ACCOUNT</h2>
                    <P>Enjoy added benefits and richer experience by creating a personal account.</P>
                    <a href="loginForm.php">
                        <p type="submit" class="submit-btn1">Create My DERISEE Account</p>
                    </a>   
                </section>
            </div>
            
        </div>
    </div> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
        $(document).ready(function(){
            $("#tag2-icon-person").click(function(){
                $("#login").addClass('show');
            });
            $(".login-background,.x,.forgot-background").click(function(){
                $("#login").removeClass('show');
            });

        });
    </script>   
    
    <!-- <script>
        $(document).ready(function(){
            $("#forgot-pass").click(function(){
                $("#forgot-pwd").addClass('showforgot');
                $("#login").removeClass('show');
            });
            $(".x").click(function(){
                $("#forgot-pwd").removeClass('showforgot');
            });
            $(".forgot-background,.cancel").click(function(){
                $("#forgot-pwd").removeClass('showforgot');
                $("#login").addClass('show');
            });

        });
    </script>   -->


    <!-- Swiper JS -->
    <script src="java/swiper.js"></script>
    
    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper('.swiper-container', {
        spaceBetween: 30,
        effect: 'fade',
        loop: true,
        pagination: {
         el: '.swiper-pagination',
         clickable: true,
        },
        navigation: {
         nextEl: '.swiper-button-next',
         prevEl: '.swiper-button-prev',
        },
    });
    </script>

</body>
</html>