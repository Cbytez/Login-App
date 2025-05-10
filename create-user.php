<?php
    include "partials/header.php";
    include "partials/navigation.php";
?>

<div class="index-container">
    <h1>Create User</h1>
    <br>
    <!-- create user using prepared statements   -->
    <?php
       $stmt = $dbs->prepare("INSERT INTO users (username, password, email, reg_date, user_role) VALUES (?, ?, ?, ?, ?)");
        if($stmt){
            $username = "Johnny Walker";
            $email = "JWalker@gmail.com";
            $password = "JWalker123";
            $reg_date = date("Y-m-d H:i:s");
            $user_role = "user";
            $stmt->execute([$username, $password, $email, $reg_date, $user_role]);
            echo "<p>User created successfully</p>";
            echo "<a href='read-user.php'>Read User</a>";
        }
        mysqli_close($dbs);
    ?>
    
    </div>

   
<?php
    include "partials/footer.php";
?>