<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <link rel="stylesheet" href="css/appointment.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="index.php">DESIREE</a>
        </div>
        <div class="account">
            <p>Appointment</p>
        </div>
    </div>

    <div class="login"> 
        <div class="login1">
            <div id="test">
                <div class="test1">
                    <div class="create">
                        <h1>BOOK AN APPOINTMENT</h1>
                    </div>
                    <div class="text">
                        <h2>BOOKING INFORMATION</h2>
                    </div>
                    <div class="login-infor">
                             <?php
                                if (isset($_GET["error"])) {
                                    if ($_GET["error"] == "emtyinput") {
                                        echo "<p>Fill in all fields!</p>";
                                    }
                                    elseif ($_GET["error"] == "alreadybook") {
                                        echo "<p>You already book an appointment!</p>";
                                    }
                                    elseif ($_GET["error"] == "none") {
                                        echo "<p>Booking success!</p>";
                                    }
                                }
                            ?>
                        <form class="form-sign-in" action="includes/booking.php" method="POST">
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
                            <label class="form-field">Phone Number*</label>
                            <input type="text" name="number" class="input-field" required>
                            <label class="form-field">Location You Want*</label>
                            <select name="location" class="input-field" required>
                                <option>169.HoangMai.Street</option>
                                <option>77.HoBaMau.Street</option>
                                <option>PhuongMai.Street</option>
                            </select>
                            <label class="form-field">The Time You Want*</label>
                            <select name="time" class="input-field" required>
                                <option>8 A.M to 9 A.M</option>
                                <option>9 A.M to 10 A.M</option>
                                <option>10 A.M to 11 A.M</option>
                                <option>12 A.M to 1 P.M</option>
                                <option>1 P.M to 2 P.M</option>
                                <option>2 P.M to 3 P.M</option>
                                <option>3 P.M to 4 P.M</option>
                                <option>4 P.M to 5 P.M</option>
                                <option>5 P.M to 6 P.M</option>
                                <option>6 P.M to 7 P.M</option>
                                <option>7 P.M to 8 P.M</option>
                                <option>8 P.M to 9 P.M</option>
                            </select>
                            <button type="submit" name="submit" class="submit-btn">Send</button>
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