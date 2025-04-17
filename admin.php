<?php
    include 'db.php';
    session_start();

    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false){
        header('Location: login.php');
        exit;
    }

    // $sql = "SELECT * FROM users";
    // $result = mysqli_query($dbs, $sql);
    // $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // var_dump($users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Hello Admin <?php echo $_SESSION['username']; ?></h1>

    <a href="logout.php">Logout</a>
</body>
</html>