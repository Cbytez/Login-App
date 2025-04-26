<?php
    include "db.php";
    


    $result = mysqli_query($dbs, "SELECT user_id, username, email, reg_date, user_role FROM users");

    

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
                    <td><?php echo $row['reg_date']; ?></td>
                    <td><?php echo $row['user_role']; ?></td>
                    <td>
                    <a href="edit-user.php?id=<?php echo $row['user_id']; ?>">Edit</a>
                    <a href="delete-user.php?id=<?php echo $row['user_id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>