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
                    redirect("admin.php");
                }
                exit();
        }
    }

?>

<div class="user-table-container">
    <h1>Manage Users</h1>
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
                            <button class="form-button" type="submit" name="delete_user">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>