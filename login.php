<?php

    include 'db.php';
    
    $error = "";
   
    //Redirect if the user is already logged in.
    if(isset($_SESSION['username'])){
        header('Location: index.php');
    }
    
    //Login form handling.
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = mysqli_real_escape_string($dbs, $_POST['username']);
        $password = mysqli_real_escape_string($dbs, $_POST['password']);
        
        //Check if the username and password exist in the database.
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        
        $result = mysqli_query($dbs, $sql);
        
        if(mysqli_num_rows($result) === 1){
            $_SESSION['username'] = $username;
            header('Location: index.php');
        } else {
            $error = "Invalid username or password";
        }
    }
    mysqli_close($dbs);   
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
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" autofocus required>
                <br><br>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required>
                <br><br>
                <button type="submit" name="login">Login</button>
                <br><br>
                <p class="register-link">Don't have an account? <a href="register.php">Register</a></p>
            </form>
        </div>
    </div>
</body>
</html>
