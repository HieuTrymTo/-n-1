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
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
    <?php
        $stt = 1;
        require_once '../../includes/dbh.inc.php';
        
        $sql = "SELECT * FROM appointment;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed1";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $num = mysqli_num_rows($result);
        }                
        mysqli_stmt_close($stmt);
    ?>
    <div class="header">
        <div class="logo">
            <a href="../../index.php">DESIREE</a>
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
                <li><a href="../user/index.php"><i class="fas fa-users"></i>User</a></li>
                <li><a href="../admin/index.php"><i class="fas fa-users-cog"></i>Admin</a></li>   
                <li><a href="../order/index.php"><i class="fas fa-shopping-cart"></i>Order</a></li> 
                <li class="special"><a href="index.php"><i class="fas fa-calendar-check"></i>Appointerment</a></li>
                <li><a href="../totalsale/index.php"><i class="fas fa-wallet"></i>Profit</a></li> 
            </ul>
        </div>
  
        <div class="admin-content">
            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "failed") {
                        echo "<p>Faile to detele. Try Again!</p>";
                    }
                    elseif ($_GET["error"] == "none") {
                        echo "<p>Delete success!</p>";
                    }
                }                 
            ?>
                    
            <div class="content">
                <div class="statistic">
                    <div class="detail">
                        <h3><i class="fas fa-comments"></i> Total Appointment</h3>
                        <h1><?php echo $num ?></h1>
                    </div>
                    <div class="detail">
                        <h3><i class="fas fa-layer-group"></i> Appointment In Arrange</h3>
                        <h1><?php echo $num ?></h1>
                    </div>
                    <div class="detail">
                        <h3><i class="fas fa-check-circle"></i> Appointment Done</h3>
                        <h1>0</h1>
                    </div>
                    <div class="detail">
                        <h3><i class="fas fa-window-close"></i> Cancel Appointment</h3>
                        <h1>0</h1>
                    </div>
                </div>
                <div class="create">
                    <h1>MANAGER USER</h1>
                </div>
                
                <table>
                    <thead>
                        <th>Appointment Id</th>
                        <th>User Id</th>
                        <th>Appointmentr Location</th>
                        <th>Appointment Time</th>
                        <th colspan="1">Appointment Guess Infor</th>
                        <th colspan="1">Action</th>

                    </thead>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['appointmentsId'];
                        $Uid = $row['usersId'];
                        $location = $row['appointmentsLocation'];
                        $time = $row['appointmentsTime'];
                    ?>
                    <tbody>             
                    <tr>
                        <td><?php echo $stt++ ?></td>
                        <td><?php echo $Uid ?></td>
                        <td><?php echo $location ?></td>
                        <td><?php echo $time ?></td>
                        <td><a href="infor.php?id=<?php echo $id; ?>" class="delete">Infor</a></td>                 
                        <td><a href="delete.php?id=<?php echo $id; ?>" class="delete">Delete</a></td>                 
                    </tr>
                    </tbody>
                    <?php
                    }
                    ?>
                </table>
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