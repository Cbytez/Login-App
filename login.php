<?php include "db.php"; ?>

<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($dbs, $sql);
        if(mysqli_num_rows($result) === 1){
            header("Location: index.php");
        }else{
            echo "<script>alert('Invalid username or password');</script>";
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
