<?php include "partials/header.php"; ?>
<?php
   

    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false){
        header('Location: login.php');
        exit;
    }

    // if($_SESSION['role'] != 'admin'){
    //     header('Location: index.php');
    //     exit;
    // }

    
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
           
        </div>
    </div>


<?php include "partials/footer.php"; ?>

