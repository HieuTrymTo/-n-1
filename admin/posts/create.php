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
                <li class="special"><a href="index.php"><i class="fas fa-box"></i>Product</a></li>
                <li><a href="../categories/index.php"><i class="fas fa-list-ul"></i>Category</a></li>
                <li><a href="../user/index.php"><i class="fas fa-users"></i>User</a></li>
                <li><a href="../admin/index.php"><i class="fas fa-users-cog"></i>Admin</a></li>   
                <li><a href="../order/index.php"><i class="fas fa-shopping-cart"></i>Order</a></li> 
                <li><a href="../appointment/index.php"><i class="fas fa-calendar-check"></i>Appointerment</a></li>
                <li><a href="../totalsale/index.php"><i class="fas fa-wallet"></i>Profit</a></li> 
            </ul>
        </div>
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn-big">Add Post</a>
                <a href="index.php" class="btn-big">Manage Posts</a>
            </div>

            <div id="test"> 
                <div class="test1">

                    <h1 class="create">ADD AN PRODUCT</h1>

                    <div class="login-infor">
                    <form class="form-sign-in" action="../../includes/add-product.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label class="form-field">File Name*</label>
                            <input type="text" name="filename" class="input-field" >
                        </div>
                        <div>
                            <label class="form-field">Product Name*</label>
                            <input type="text" name="name" class="input-field" required>
                        </div>
                        <div>
                            <label class="form-field">Product Describes*</label>
                            <input type="text" name="desc" class="input-field" required>
                        </div>
                        <div>
                            <label class="form-field">Product Category ID*</label>
                            <select type="text" name="category" class="input-field" required>
                                <?php 
                                    for ($i = 9; $i <= 34 ; $i++) { 
                                        ?>
                                            <option value="<?php echo $i?>"><?php echo $i?></option>
                                        <?php
                                    }  
                                ?>
                            </select>   
                        </div>
                        <div>
                            <label class="form-field">Product Price*</label>
                            <input type="text" name="price" class="input-field" required>
                        </div>
                        <div>
                            <label class="form-field">Sale State*</label>
                            <select name="salestate" class="input-field" required>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-field">Sale Price*</label>
                            <input type="text" name="saleprice" class="input-field" required>
                        </div>
                        <div>
                            <label class="form-field">Product Color*</label>
                            <input type="text" name="color" class="input-field" required>
                        </div>
                        <div>
                            <label class="form-field">Product Size*</label>
                            <input type="text" name="size" class="input-field" required>
                        </div>
                        <div>
                            <label class="form-field">Product Quantity*</label>
                            <input type="text" name="quantity" class="input-field" required>
                        </div>
                        <!-- <div>
                            <label>Body</label>
                            <textarea name="body" id="body"></textarea>
                        </div> -->
                        <div>
                            <label class="form-field">Image*</label>
                            <input type="file" name="image" class="input-field" required>
                        </div>
                        <!-- <div>
                            <label>Topic</label>
                            <select name="topic" class="text-input">
                                <option value="Poetry">Poetry</option>
                                <option value="Life Lessons">Life Lessons</option>
                            </select>
                        </div> -->
                        <div>
                            <button type="submit" name="submit" class="submit-btn">Add product</button>
                        </div>
                    
                    </form>          
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