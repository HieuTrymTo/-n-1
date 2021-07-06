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
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="index.php">DESIREE</a>
        </div>
        <div class="account">
            <p>Profile</p>
        </div>
    </div>

    <?php    
    if (!isset($_SESSION["userid"])) {
        ?>
        <div id="profile">
            <div class="banner">
                <!-- <img src="images/key-web-banner.jpg"> -->
            </div>
            <div id="profile2">
                <a href="index.php">
                    <h4>You Must Login</h4>
                </a>
            </div>
        </div>
        <?php        
    }
    ?>

    <?php 
    if (isset($_SESSION["userid"])) {
        ?>
        <div id="profile">
            <div class="banner">
                <!-- <img src="images/key-web-banner.jpg"> -->
            </div>
            <div class="name">
                <h4><?php echo $_SESSION["username"]?></h4>
            </div>
            <div class="infor">
                <div class="myprofile">
                    <div class="header">
                        <h1>My Profile</h1>
                    </div>
                    <div class="content">
                        <h6>EMAIL&ensp;:<p>&ensp;<?php echo $_SESSION["useremail"]?></p></h6>
                        <h6>PASSWORD&ensp;:&ensp;<p style="-webkit-text-security: circle;"><?php echo $_SESSION["userpwd"]?></p></h6>
                        <a href="">
                            <button type="button" class="change-pass"><p>Change My Password</p></button>
                        </a>
                        <a href="">
                            <button type="button" class="edit-email">Edit My Email</button>
                        </a>
                    </div>
                </div>

            </div>
            <div class="booking">
                    <div class="myorder">
                        <div class="header">
                            <h1>My Orders</h1>                  
                        </div>
                        <div class="content">
                    
                            <?php
                                require_once 'includes/dbh.inc.php';

                                $id = $_SESSION["userid"];
 
                                $sql = "SELECT o1.usersId, o1.ordersProcess, o2.ordersItems, o2.ordersPrice, o2.ordersQuantity FROM order_manager o1 INNER JOIN order_item o2 ON o1.ordersId = o2.ordersId WHERE o1.usersId='$id';";
                                $stmt = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    echo "SQL statement failed1";
                                } else {
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);
                                    


                                    ?>
                                    <table style="width:100%">
                                        <thead>
                                            <th></th>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Process</th>
                                        </thead>
                                    <?php
                    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $itemprocess = $row['ordersProcess'];
                                        $item = $row['ordersItems'];
                                        $price = $row['ordersPrice'];
                                        $quantity = $row['ordersQuantity'];
                                    ?>                                                            
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td style="border: none;"><?php echo $item ?></td>
                                            <td style="border: none;"><?php echo $price ?></td>
                                            <td style="border: none;"><?php echo $quantity ?></td>
                                            <td style="border: none;"><?php echo $itemprocess ?></td>
                                        </tr>
                                        </tbody>
                                    <?php
                                    }
                                }
                            ?>
                                    </table>
                            <?php
                                mysqli_stmt_close($stmt);
                            ?>
                        
                        </div>
                    </div>
                    <div class="mybooking">
                        <div class="header">
                            <h1>My Appointment</h1>                  
                        </div>
                        <div class="content">
                    
                            <?php
                                require_once 'includes/dbh.inc.php';

                                ?>
                                <table style="width:100%">
                                <thead>
                                    <th>Location</th>
                                    <th>Time</th>
                                </thead>
                                
                                <tbody>
                                    <?php                         
                                        $sql = "SELECT * FROM appointment WHERE usersId=? ;";
                                        $stmt = mysqli_stmt_init($conn);
                                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                                            echo "SQL statement failed1";
                                        } else {
                                            mysqli_stmt_bind_param($stmt, "s", $id);
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);
                            
                                            $row = mysqli_fetch_assoc($result);
                                        
                                            $location = $row['appointmentsLocation'];
                                            $time = $row['appointmentsTime'];
                                                    
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td style="border: none;"><?php echo $location ?></td>
                                                    <td style="border: none;"><?php echo $time ?></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            
                                        }
                                    ?>
                                </tbody>
                            </table>
                                
                            <?php
                                mysqli_stmt_close($stmt);
                            ?>
                            <div class="button">
                                <a href="">
                                    <button type="button" class="change-booking"><p>Change The Booking</p></button>
                                </a>
                                <a href="">
                                    <button type="button" class="cancel-booking">Cancel The Booking</button>
                                </a>
                            </div>        
                        </div>
                    </div>
            </div>
        </div>
    <?php
    }
    ?>
      



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