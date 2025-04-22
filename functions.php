<?php



function setActiveClass($pageName){
    $current_page = basename($_SERVER['PHP_SELF']);
    return  ($current_page === $pageName) ? 'active' : '';
}

function isLoggedIn(){
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}


?>