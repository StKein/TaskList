<?php
/***
    Main page controller
 ***/
$route[1] = ( (int)$route[1] ) ? (int)$route[1] : 1;
include_once __DIR__."/../include/get_task_manager.php";
$tasks = $task_manager->getTasks( $_SESSION["sorting_field"], $route[1] );

include_once __DIR__."/../views/tasks/user_status.php";
if( $tasks->num_rows ){
	$pages_count = $task_manager->getTaskPagesCount();
	
	include_once __DIR__."/../views/tasks/noempty.php";
} else {
	include_once __DIR__."/../views/tasks/empty.php";
}
?>