<?php
/***
    Admin login/logout form
 ***/
if( $_SESSION["admin"] ){
    include_once __DIR__."/../views/admin/logout.php";
} else {
    include_once __DIR__."/../views/admin/login.php";
}
?>