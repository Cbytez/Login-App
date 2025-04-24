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
?>