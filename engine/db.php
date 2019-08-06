<?php
/***
    DB connection file
    Include when DB queries are required
 ***/

// DB config is stored in .dbconf file
// If it's not present or unable to parse it, default config is used
try {
    $dbconf = json_decode( file_get_contents( __DIR__."/.dbconf" ), true );
} catch( Exception $e ){}
if( !$dbconf ){
    $dbconf = array();
    $dbconf["server"] = "localhost";
    $dbconf["user"] = "root";
    $dbconf["password"] = "";
    $dbconf["dbname"] = "tasklist";
}

// Connection to DB server
$db = new mysqli( $dbconf["server"], $dbconf["user"], $dbconf["password"] );
if( $db->connect_error ){
    exit( "DB server connection failed: ".$db->connect_error );
}

// Use specific DB. If it doesn't exist, create it
$db->query( "CREATE DATABASE IF NOT EXISTS `".$dbconf["dbname"]."`" );
$db->query( "USE `".$dbconf["dbname"]."`" );
if( $db->error ){
    exit( "DB creation/usage failed: ".$db->error );
}

// If required table doesn't exist, create
$db->query(
    "CREATE TABLE IF NOT EXISTS `tasks`( ".
        "`id` INT AUTO_INCREMENT PRIMARY KEY, ".
        "`username` VARCHAR(30) NOT NULL, ".
        "`email` VARCHAR(40) NOT NULL, ".
        "`task` TEXT NOT NULL, ".
        "`is_completed` INT NOT NULL DEFAULT 0, ".
        "`hash` VARCHAR(50) NOT NULL, ".
        "INDEX ind_hash(`hash`) ".
    ")"
);
if( $db->error ){
    exit( "DB tasks table creation failed: ".$db->error );
}
?>