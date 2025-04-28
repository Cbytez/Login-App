<?php



    function setActiveClass($pageName){
        $current_page = basename($_SERVER['PHP_SELF']);
        return  ($current_page === $pageName) ? 'active' : '';
    }

    function getPageclass(){
        return basename($_SERVER['PHP_SELF'],'.php');
    }

    function isLoggedIn(){
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    function getUserRole(){
        return isset($_SESSION['user_role']) ? $_SESSION['user_role'] : 'guest';
    }

    function getUserEmail(){
        return isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';
    }


    function usernameExists($username){
        global $dbs;
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $dbs->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->rowCount() > 0;
    }

    function emailExists($email){
        global $dbs;
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $dbs->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->rowCount() > 0;
    }

    function isAdmin($username = ''){
        global $dbs;
        $sql = "SELECT * FROM users WHERE username = ? AND user_role = 'admin'";
        $stmt = $dbs->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->rowCount() > 0;
    }

    function deleteUser($user_id){
        global $dbs;
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $dbs->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->rowCount() > 0;
    }

    function redirect($url){
        header("Location: $url");
        exit();
    }

    function full_month_date($date){
        return date('F j, Y, g:i a', strtotime($date));
    }

    function check_query($result){
        global $dbs;
        if(!$result){
            die("Query Failed: " . mysqli_error($dbs));
        }
        return $result;
    }
?>