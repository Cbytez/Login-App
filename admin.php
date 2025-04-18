<?php include "partials/header.php"; ?>
<?php
    

    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false){
        header('Location: login.php');
        exit;
    }

   
?>


    <h1>Hello Admin <?php echo $_SESSION['username']; ?></h1>
    <br>
    <a href="index.php">Home</a>
    <br>
    <a href="logout.php">Logout</a>
<?php include "partials/footer.php"; ?>