<?php include "partials/header.php"; ?>


<?php
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'){
        redirect('admin.php');
    }

    
?>

    <div class="index-container">
        <?php include "partials/navigation.php"; ?>
        <div class="hero">
          <div class="hero-image-container">
            <div class="hero-image">
                <div class="hero-image-text">
                    <h1>Welcome To Our PHP Login App</h1>                    
                </div>
            </div>
            <div class="hero-content">
                <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
                    <h1 class="hero-content-text">Welcome <?php echo $_SESSION['username']; ?></h1>
                    <br>
                    <a href="create-user.php" class="index-place">Create User</a>
                    <br>
                    <a href="read-user.php" class="index-place">Read User</a>   
                <?php endif; ?>
                <p>Securely login and manage your account with us.</p>
            </div>
          </div>
        </div>
        <?php include "partials/footer.php"; ?>
    </div>
