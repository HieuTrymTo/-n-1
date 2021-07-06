<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../../css/help.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="index.php">DESIREE</a>
        </div>
        <div class="help">
            <p>Admin</p>
        </div>
    </div>

    <div class="admin-wrapper">
        <div class="left-sidebar">
            <ul>
                <li><a href="../posts/index.php"><i class="fas fa-box"></i>Product</a></li>
                <li><a href="../categories/index.php"><i class="fas fa-list-ul"></i>Category</a></li>
                <li class="special"><a href="index.php"><i class="fas fa-users"></i>User</a></li>
                <li><a href="../admin/index.php"><i class="fas fa-users-cog"></i>Admin</a></li>   
                <li><a href="../order/index.php"><i class="fas fa-shopping-cart"></i>Order</a></li> 
                <li><a href="../appointment/index.php"><i class="fas fa-calendar-check"></i>Appointerment</a></li>
                <li><a href="../totalsale/index.php"><i class="fas fa-wallet"></i>Profit</a></li> 
            </ul>
        </div>
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn-big">Add Users</a>
                <a href="index.php" class="btn-big">Manage Users</a>
            </div>

            <div class="login1">
            <div id="test">
                <div class="test1">
                    <div class="create">
                        <h1>ADD AN USER</h1>
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
                        <form class="form-sign-in" action="add.user.inc.php" method="POST">
                            <label class="form-field">User Name*</label>
                            <input type="text" name="name" class="input-field" required>
                            <label class="form-field">User Email*</label>
                            <input type="email" name="email" class="input-field" required>
                            <label class="form-field">User ID*</label>
                            <input type="text" name="uid" class="input-field" required>
                            <label class="form-field">Password*</label>
                            <input type="password" name="pwd" class="input-field" required>
                            <label class="form-field">Password Confirmation*</label>
                            <input type="password" name="pwdrepeat" class="input-field" required>
                            <button type="submit" name="submit" class="submit-btn">Add</button>
                    </div>
                     
                    
                </div>
            </div>    
        </div> 
        </div>
    </div>

    <div id="footer">
        <div class="footer1">
            <h3>DESIREE</h3>
        </div>
        
    </div>

</body>
</html>