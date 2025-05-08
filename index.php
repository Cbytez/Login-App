<?php include "partials/header.php"; ?>


<?php
    // if(isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'){
    //     redirect('admin.php');
    // }

    
?>

    <div class="index-container">
        <?php include "partials/navigation.php"; ?>
        <div class="hero">
          <div class="hero-image-container">
            <div class="hero-image">
                <div class="hero-image-text">
                    <h1>Welcome To Our PHP Login App</h1>
                    <br>
                        <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
                            <h2>Welcome <?php echo $_SESSION['username']; ?></h2>
                            <br>
                            <a href="create-user.php" class="index-link">Create User</a>
                            <br>
                            <a href="read-user.php" class="index-link">Read User</a>
                        <?php endif; ?>
                </div>
            </div>
            <div class="hero-content">
                <p>Securely login and manage your account with us.</p>
            </div>
          </div>
        </div>
        <?php include "partials/footer.php"; ?>
    </div>
