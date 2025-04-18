<?php include "partials/header.php"; ?>

    <div class="container">
        <h2 class="hero">Welcome To The Home Page.</h2>
        <p>
            <div class="button-container">
                <div class="button">
                    <a href="login.php">Login</a>
                </div>
                <div class="button">
                    <a href="register.php">Register</a>
                </div>

                <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>   
                    <div class="button">
                        <a href="admin.php">Admin</a>
                    </div>
                <?php endif; ?>

                <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
                    <div class="button">
                        <a href="logout.php">Logout</a>
                    </div>
                <?php endif; ?>
            </div>
    </p>
    </div>

<?php include "partials/footer.php"; ?>