<?php
    include "partials/header.php";
    include "partials/navigation.php";
?>

<div class="index-container">
    <h2>User Record</h2>
    <br>
    <table class="user-table">
        <thead>
            <tr>
                
                <th>Username</th>
                <th>Email</th>
                <th>Registration Date</th>
                <th>User Role</th>
                

            </tr>
        </thead>
        <tbody>
            <!-- user record from database with prepared statements. --> 
            <?php
                $stmt = $dbs->prepare("SELECT * FROM users");
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                   echo "<td>".$row['username']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['reg_date']."</td>";
                    echo "<td>".$row['user_role']."</td>";
                    echo "</tr>";
                }
                mysqli_stmt_close($stmt);
            ?>
            </tr>
    </tbody>
    </table>
    
    
    </div>

   
<?php
    include "partials/footer.php";
?>