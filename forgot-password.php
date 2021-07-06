<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>
    <link rel="stylesheet" href="css/forgot-password.css">
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

    <div id="forgot-pwd">
        <div class="forgot-form">
            
            <div class="inside-forgot-form">
                <section class="form-forgot">
                    <h2>CHANGE YOUR PASSWORD</h2>

                    <p>In order to reset your password, please provide us your email. We will send you an email momentarily.</p>

                    <form class="form-forgot" action="includes/reset-request.inc.php" method="POST">                      
                        <label class="form-field">Email*</label>
                        <input type="email" name="email" class="email" required>
                        <div class="send-field">
                            <a href="index.php">
                                <div class="cancel"><p>Cancel</p></div>
                            </a>

                            <button type="submit" name="reset-request-submit" class="send">Send</button>  
                        </div>
                    </form>
                    <?php
                        if (isset($_GET["reset"])) {
                            if ($_GET["reset"] == "success") {
                                echo '<p class ="resetsuccess">Check your e-mail!</p>';
                            }
                        }
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