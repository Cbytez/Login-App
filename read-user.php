<?php
    include "partials/header.php";
    include "partials/navigation.php";
?>

<div class="index-container">
    <h1>Read User</h1>
    <br>
    <div class="read-user-container">
        <div class="read-user-card">
            <h2>User Information:</h2>

           <!-- prepared statements  -->
            <?php
               
                // get user id from session
                $the_user_id = 26;
                $stmt = mysqli_prepare($dbs, "SELECT user_id, username, email, reg_date FROM users WHERE user_id = ?");
                mysqli_stmt_bind_param($stmt, "i", $the_user_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $the_user_id, $username, $email, $reg_date);
                if(mysqli_stmt_fetch($stmt)){
                    echo "<p>ID: {$the_user_id}</p>";
                    echo "<p>Username: $username</p>";
                    echo "<p>Email: $email</p>";
                    echo "<p>User since: " . full_month_date($reg_date) . "</p>";
                }else{
                    echo "<p>No user found</p>";
                }
            ?>
           
        </div>
    </div>
</div>

<?php
    include "partials/footer.php";
?>