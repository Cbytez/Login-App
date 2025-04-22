<?php
    
    include 'db.php';
    session_start();
    $error = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Registration variables.
        $username = mysqli_real_escape_string($dbs, $_POST['username']);
        $email = mysqli_real_escape_string($dbs, $_POST['email']);
        $password = mysqli_real_escape_string($dbs, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($dbs, $_POST['confirm_password']);

        //Error handling.
        if($password !== $confirm_password){
            $error = "Passwords do not match";
        }else{

            //Check if username already exist in the database.
            $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
            $result = mysqli_query($dbs, $sql);

            if(mysqli_num_rows($result) === 1){
                $error = "Username already exists, Please choose another.";
            }else{
                
                //Check if email already exist in the database
                $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
                $result = mysqli_query($dbs, $sql);

                if(mysqli_num_rows($result) === 1){
                    $error = "Email already exists, Please choose another.";

                }else{
                    //Hash the password and insert the data into the database.
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$passwordHash', '$email')";

                    if(mysqli_query($dbs, $sql)){
                        echo "User Added successfully";
                    }else{
                        echo "Error: NOT INSERTED". mysqli_error($dbs);
                    }
                }
            }
            
        }
    }
    //Close the database connection.
    mysqli_close($dbs);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Registration</title>
</head>

<body>
    <div class="container">
        <div class="form-container">

            <form method="POST" action="">
                <h2>Create your Account</h2>

                <?php if ($error): ?>
                    <p style="color:red">
                        <?php echo $error; ?>
                    </p>
                <?php endif; ?>

                <label for="username">Username:</label>
                <input value="<?php echo isset($username) ? $username : ''; ?>" placeholder="Enter your username" type="text" name="username" required>
                <br>
                <br>
                <label for="email">Email:</label>
                <input value="<?php echo isset($email) ? $email : ''; ?>" placeholder="Enter your email" type="email" name="email" required>
                <br>
                <br>
                <label for="password">Password:</label>
                <input placeholder="Enter your password" type="password" name="password" required>
                <br>
                <br>
                <label for="confirm_password">Confirm Password:</label>
                <input placeholder="Confirm your password" type="password" name="confirm_password" required>
                <br>
                <button class="form-button" value="register">Register</button>
                <br>
                <br>
                <p>Already have an account? <a class="login-link" href="login.php"> Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>