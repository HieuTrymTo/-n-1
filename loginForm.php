<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>
    <link rel="stylesheet" href="css/loginForm.css">
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
                        <h1>CREATE A NEW ACCOUNT</h1>
                    </div>
                    <div class="text">
                        <h2>LOGIN INFORMATION</h2>
                    </div>
                    <div class="login-infor">
                             <?php
                                if (isset($_GET["error"])) {
                                    if ($_GET["error"] == "emtyinput") {
                                        echo "<p>Fill in all fields!</p>";
                                    }
                                    elseif ($_GET["error"] == "invaliduid") {
                                        echo "<p>Choose a proper username!</p>";
                                    }
                                    elseif ($_GET["error"] == "invalidemail") {
                                        echo "<p>Choose a proper email!</p>";
                                    }
                                    elseif ($_GET["error"] == "passwordsdontmatch") {
                                        echo "<p>Passwords doesn't match!</p>";
                                    }
                                    elseif ($_GET["error"] == "stmtfailed") {
                                        echo "<p>Something went wrong, try again!</p>";
                                    }
                                    elseif ($_GET["error"] == "usernametaken") {
                                        echo "<p>Username already taken!</p>";
                                    }
                                    elseif ($_GET["error"] == "none") {
                                        echo "<p>You have signed up!</p>";
                                    }
                                }
                                if (isset($_GET["newpwd"])) {
                                    if ($_GET["newpwd"] == "passwordupdated") {
                                        echo "<p>Your password has been reset!</p>";
                                    }
                                }
                            ?>
                        <form class="form-sign-in" action="includes/signup.inc.php" method="POST">
                            <label class="form-field">Your Name*</label>
                            <input type="text" name="name" class="input-field" required>
                            <label class="form-field">Your Email*</label>
                            <input type="email" name="email" class="input-field" required>
                            <label class="form-field">User ID*</label>
                            <input type="text" name="uid" class="input-field" required>
                            <label class="form-field">Password*</label>
                            <input type="password" name="pwd" class="input-field" required>
                            <label class="form-field">Password Confirmation*</label>
                            <input type="password" name="pwdrepeat" class="input-field" required>
                            <input type="checkbox" class="term" required> I agree to the terms & conditons</input>
                            <button type="submit" name="submit" class="submit-btn">Sign Up</button>
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