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
            $stmt = mysqli_prepare($dbs, "SELECT user_id, username, email, reg_date FROM users WHERE user_id = ?");
            
                if($stmt){
                    $user_id = 26;
                    mysqli_stmt_bind_param($stmt, "i", $user_id);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $user_id, $username, $email, $reg_date);
                        if(mysqli_stmt_fetch($stmt)){
                            echo "<p>ID: {$user_id}</p>";
                            echo "<p>Username: $username</p>";
                            echo "<p>Email: $email</p>";
                            echo "<p>User since: " . full_month_date($reg_date) . "</p>";
                        }
                    mysqli_stmt_close($stmt);
                }
            ?>
           
        </div>
    </div>
</div>

<?php
    include "partials/footer.php";
?>