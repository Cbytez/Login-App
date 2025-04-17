<?php
    include 'db.php';

    session_start();

    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
        header('Location: admin.php');
        exit;
    }

    $error = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = mysqli_real_escape_string($dbs, $_POST['username']);
        $password = mysqli_real_escape_string($dbs, $_POST['password']);
     
        $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $result = mysqli_query($dbs, $sql);
        

        if(mysqli_num_rows($result) === 1){
            $user = mysqli_fetch_assoc($result);

            // var_dump($user);

            if(password_verify($password, $user['password'])){
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $user['username'];
                header('Location: index.php');
            }else{
                $error = "Invalid Password!";
            }            
            
        }else{
            $error = "User Not Found!";
        }

        

    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <div class="login-form-container">
            <form method="POST" action="">
                <h2>Login</h2>
                <?php if(!empty($error)): ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" autofocus required>
                <br><br>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required>
                <br><br>
                <button type="submit" name="login">Login</button>
                <br><br>
                <p class="register-link">Don't have an account? <a href="register.php">Register</a></p>                
                <a href="logout.php">Logout</a>
            </form>
        </div>
    </div>
</body>
</html>

