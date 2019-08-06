<?php
/***
    Task creation/modification
 ***/
if( $route[1] ){
    include_once __DIR__."/../include/get_task_manager.php";
    $task = $task_manager->getTask( $route[1] );
	
	include_once __DIR__."/../views/tasks/edit.php";
} else {
	include_once __DIR__."/../views/tasks/new.php";
}
?>