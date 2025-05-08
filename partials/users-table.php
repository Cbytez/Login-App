<?php
    include "db.php";
    


    $result = mysqli_query($dbs, "SELECT user_id, username, email, reg_date, user_role FROM users");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['edit_user'])){
                $user_id = mysqli_real_escape_string($dbs, $_POST['user_id']);
                $new_email = mysqli_real_escape_string($dbs, $_POST['email']);

                $sql = "UPDATE users SET email = '$new_email' WHERE user_id = '$user_id'";
                $result = mysqli_query($dbs, $sql);
                if(check_query($result)){
                    $_SESSION['notification'] = "User updated successfully";
                    $_SESSION['notification_type'] = "success";
                    redirect("admin.php");
                }
                exit();
        }

        if(isset($_POST['delete_user'])){
            $user_id = mysqli_real_escape_string($dbs, $_POST['user_id']);
            $sql = "DELETE FROM users WHERE user_id = '$user_id'";
            $result = mysqli_query($dbs, $sql);
            if(check_query($result)){
                $_SESSION['notification'] = "User deleted successfully";
                $_SESSION['notification_type'] = "success";
                redirect("admin.php");
            }
            exit();
        }

        // Create user with validation and prevent SQL injection.
        if(isset($_POST['create_user'])){
            $username = mysqli_real_escape_string($dbs, $_POST['username']);
            $password = mysqli_real_escape_string($dbs, $_POST['password']);
            $email = mysqli_real_escape_string($dbs, $_POST['email']);
            $user_role = mysqli_real_escape_string($dbs, $_POST['user_role']);


            //Hash the password and insert the data into the database.
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($dbs, "INSERT INTO users (username, password, email, user_role) VALUES (?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "ssss", $username, $passwordHash, $email, $user_role);
            mysqli_stmt_execute($stmt);
            if(mysqli_stmt_affected_rows($stmt) > 0){
                $_SESSION['notification'] = "User created successfully";
                $_SESSION['notification_type'] = "success";
                redirect("admin.php");
            }
            exit();
        }

    }

?>

<div class="user-table-container">
    <h1>Manage Users</h1>

    <?php if(isset($_SESSION['notification'])): ?>
        <div class="notification <?php echo $_SESSION['notification_type']; ?>">
            <?php echo $_SESSION['notification']; ?>
            <?php unset($_SESSION['notification']); ?>
        </div>
    <?php endif; ?>

    <table class="user-table">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Registration Date</th>
                <th>User Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo full_month_date($row['reg_date']); ?></td>
                    <td><?php echo $row['user_role']; ?></td>
                    <td>
                        <form method="POST" style="display:inline-block;">
                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
                            <button class="form-button" type="submit" name="edit_user">Edit</button>
                        </form>
                        <form method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                            <button class="form-button-delete" type="submit" name="delete_user">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<hr>
<!-- Create user form. -->
<div class="create-user-container">
    <h1>Create User</h1>
    <div class="user-form-container">
    <form action="admin.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="user_role">User Role</label>
            <input type="text" name="user_role" placeholder="User Role">
        </div>
        <input type="submit" name="create_user" value="Create User">
    </form>
</div>
<br>
<?php include "partials/footer.php"; ?>

