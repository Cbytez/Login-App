<?php 
    $current_page = basename($_SERVER['PHP_SELF']);
    
?>
<div class="container">
    <p>
        <div class="button-container">
            <div class="ul">
                    <li><a class="<?php
                    
                    echo $current_page == 'index.php' ? 'active' : '';
                    
                    ?>" href="index.php">Home</a></li>
            
                <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == false): ?>
           
                    <li><a href="login.php">Login</a></li>
           
           
                <a href="register.php">Register</a>
            
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