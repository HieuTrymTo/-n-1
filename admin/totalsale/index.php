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
        require_once '../../includes/dbh.inc.php';

        $sql = "SELECT * FROM order_manager ;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed1";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $numorder = 0;
            $total = 0;

            while($row = mysqli_fetch_assoc($result)) {
                $numorder = $numorder + 1;
                $total = $total + $row['ordersValue'];
            }
                            

            $sql = "SELECT * FROM order_manager WHERE ordersTime > NOW() - interval 1 week";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $numorderin7days = 0;
                $total7days = 0;
                                
                while($row = mysqli_fetch_assoc($result)) {
                    $numorderin7days = $numorderin7days + 1;
                    $total7days = $total7days + $row['ordersValue'];
                }
                                
                ?>
                <?php 
            }
                            
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
                <li><a href="../appointment/index.php"><i class="fas fa-calendar-check"></i>Appointerment</a></li>
                <li class="special"><a href="index.php"><i class="fas fa-wallet"></i>Profit</a></li> 
            </ul>
        </div>
        <div class="admin-content">
            <div class="statistic">
                <div class="detail">
                    <h3><i class="fab fa-shopify"></i> Order In Last 7 Days</h3>
                    <h1><?php echo $numorderin7days ?></h1>
                </div>
                <div class="detail">
                    <h3><i class="fas fa-dollar-sign"></i> Profit In Last 7 Days</h3>
                    <h1>$<?php echo $total7days ?></h1>
                </div>
                <div class="detail">
                    <h3><i class="fab fa-shopify"></i> Total Order</h3>
                    <h1><?php echo $numorder ?></h1>
                </div>
                <div class="detail">
                    <h3><i class="fas fa-dollar-sign"></i> Total Profit</h3>
                    <h1>$<?php echo $total ?></h1>
                </div>
            </div>
            <br>
            <br>
            <div class="rank">
            <div class="content">
                <div class="create">
                    <h1>MOST BUYING GUESS</h1>
                </div>
                
                <table>
                    <thead>
                        <th></th>
                        <th>Guest Name</th>
                        <th>Value</th>
                    </thead>
                    <?php
                        $stt = 0;
                        require_once '../../includes/dbh.inc.php';

                        $sql = "SELECT o2.ordersName, SUM(o1.ordersValue) AS valuesCount FROM order_manager o1 INNER JOIN order_infor o2 ON o1.ordersId = o2.ordersId GROUP BY o2.ordersName ORDER BY valuesCount DESC LIMIT 5";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement failed1";
                        } else {
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
            
                            while ($row = mysqli_fetch_assoc($result)) {
                                $stt++;
                                $Name = $row['ordersName'];
                                $Value = $row['valuesCount'];
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $Name ?></td>   
                                        <td>$<?php echo $Value ?></td>             
                                    </tr>
                                </tbody>
                                <?php       
                            }       
                        }
                        mysqli_stmt_close($stmt);
                    ?>
                </table>
            </div>

            <div class="content" style="margin-left: 90px;">
                <div class="create">
                    <h1>MOST SALE</h1>
                </div>
                
                <table>
                    <thead>
                        <th></th>
                        <th>Product Name</th>
                        <th>Seiling Num</th>
                    </thead>
                    <?php
                        $stt = 0;
                        require_once '../../includes/dbh.inc.php';

                        $sql = "SELECT ordersItems, COUNT(*) AS productsCount FROM order_item GROUP BY ordersItems ORDER BY productsCount DESC LIMIT 5";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement failed1";
                        } else {
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
            
                            while ($row = mysqli_fetch_assoc($result)) {
                                $stt++;
                                $Name = $row['ordersItems'];
                                $Num = $row['productsCount'];
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $Name ?></td>                
                                        <td><?php echo $Num ?></td>                
                                    </tr>
                                </tbody>
                                <?php       
                            }       
                        }
                        mysqli_stmt_close($stmt);
                    ?>
                </table>
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