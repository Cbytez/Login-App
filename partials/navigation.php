<?php 
   include 'functions.php';
    
?>
<div class="container">
    <p>
        <div class="button-container">
            <div class="ul">
                    <li><a class="<?php

                    echo setActiveClass('index.php');
                    
                    ?>" href="index.php">Home</a></li>
            
                <?php if(!isLoggedIn()): ?>
           
                    <li><a class="<?php echo setActiveClass('login.php'); ?>" href="login.php">Login</a></li>
           
           
                    <li><a class="<?php echo setActiveClass('register.php'); ?>" href="register.php">Register</a></li>
            
                <?php endif; ?>

                <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>   
                    <li><a href="admin.php">Admin</a></li>
                
                <?php endif; ?>

                <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
                
                    <li><a href="logout.php">Logout</a></li>
               
                <?php endif; ?>

            </ul>
        </div>
    </p>
</div>