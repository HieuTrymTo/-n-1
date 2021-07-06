<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/new-password.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="index.php">DESIREE</a>
        </div>
        <div class="account">
            <p>Account</p>
        </div>
    </div>

    <div class="login"> 
        <div class="login1">
            <div id="test">
                <div class="test1">
                    <div class="create">
                        <h1>MYDESIREE ACCOUNT ACTIVATION</h1>
                    </div>
                    <div class="text">
                        <h2>PLEASE ENTER A NEW PASSWORD</h2>
                    </div>
                    <div class="password">
                        <?php
                            $selector = $_GET["selector"];
                            $validator = $_GET["validator"];

                            if (empty($selector) || empty($validator)) {
                                echo "Could not validate your request";
                            }
                            else {
                                if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                                    ?>

                                    <form class="form-sign-in"  action="includes/reset-password.inc.php" method="POST">
                                        <input type="hidden" name="selector" value="<?php echo $selector ?>">
                                        <input type="hidden" name="validator" value="<?php echo $validator ?>">
                                        <label class="form-field">Your New Password*</label>
                                        <input type="password" name="pwd" class="input-field" required>
                                        <label class="form-field">Confirm your password*</label>
                                        <input type="password" name="pwd-repeat" class="input-field" required>
                                        <button type="submit" name="reset-password-submit" class="submit-btn">Reset Password</button>
                                    </form>

                                    <?php
                                }
                            }
                        ?>
                    </div>
                   
                </div>
            </div>
        </div>

        <div class="infor">
            <div class="call">
                <p>CALL US</p>
            </div>
            <div class="contact">
                <a href="">+1.866.DESIREE</a>
            </div>
            <div class="email">
                <a href="">Email Us</a>
            </div>
            <div class="find">
                <div class="da">
                    <p>WHAT YOU'LL FIND IN YOUR DESIREE ACCOUNT</p>
                </div>
                <div class="ao">
                    <p>Access your order history</p>
                </div>
                <div class="ao">
                    <p>Manage your personal information</p>
                </div>
                <div class="ao">
                    <p>Register your wishlist</p>
                </div>
                <div class="ao">
                    <p>Receive DESIREE's digital communications</p>
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
                <li><a href="">Appsp</a></li> 
                <li><a href="">Follow Us</a></li> 
                <li><a href="">Legal Notice</a></li> 
                <li><a href="">Sitemap</a></li> 
            </ul>
        </div>
    </div>
</body>
</html>
