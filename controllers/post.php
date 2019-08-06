<?php
/***
    Form submits handler
 ***/

// Log as admin
if( isset( $_POST["admin_login"] ) ){
    if( htmlspecialchars( $_POST["login"] ) == "admin" && htmlspecialchars( $_POST["pass"] ) == "123" ){
        $_SESSION["admin"] = '1';
    }
}

// Logout as admin
if( isset( $_POST["admin_logout"] ) ){
    unset( $_SESSION["admin"] );
}

// Create/edit task
if( isset( $_POST["task"] ) ){
    include_once __DIR__."/../include/get_task_manager.php";
	if( $_POST["task"] ){
		$task_manager->updateTask( $_POST );
	} else {
		$task_manager->createTask( $_POST );
	}
}

// Sorting
if( isset( $_POST["sort"] ) ){
	$_SESSION["sorting_field"] = htmlspecialchars( $_POST["sort"] );
}
?>