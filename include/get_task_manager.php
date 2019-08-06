<?php
include_once __DIR__."/../engine/db.php";
include_once __DIR__."/../models/TaskManager.php";
$task_manager = new TaskManager( $db );
?>