<?php include "partials/header.php"; ?>
<?php include "functions.php"; ?>
<?php
   

    if(!isLoggedIn()){
        redirect('login.php');
    }

   

    
    
?>
    <div class="container">
        <div class="admin-navbar">
            <div class="admin-ul">
                    <li><a href="admin.php" class="active">Admin</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="logout.php">Logout</a></li>
                
            </div>
        </div>
        <div class="admin-main">
            <h1>Hello Admin <?php echo $_SESSION['username']; ?></h1>
            <h2>Welcome to the Admin Panel</h2>
            
            

            <?php include "partials/users-table.php"; ?>
        </div>
    </div>


<?php include "partials/footer.php"; ?>

<?php mysqli_close($dbs); ?>

