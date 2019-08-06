<?php
class TaskManager{

    private
        $db,
        $table_name;


    const TASKS_PER_PAGE = 3;


    public function __construct( mysqli $db ){
        $this->db = $db;
		$this->table_name = "tasks";
    }


    public function getTask( $hash ){
        $task = $this->db->query(
            "SELECT * ".
            "FROM `".$this->table_name."` ".
            "WHERE `hash` = '".$this->db->real_escape_string( $hash )."'"
        );

        return ( $task->num_rows > 0 ) ? $task->fetch_assoc() : "";
    }

    public function getTasks( $sorting_field, $page_num = 1 ){
        switch( $sorting_field ){
            case "mail":
                $sorting_field = "email";
                break;
            case "status":
                $sorting_field = "is_completed";
                break;
            case "name":
            default:
                $sorting_field = "username";
                break;
        }
        $page_num = ( (int)$page_num < 1 ) ? 1 : $this->db->real_escape_string( (int)$page_num );

        return $this->db->query(
            "SELECT * ".
            "FROM `".$this->table_name."` ".
            "ORDER BY `".$sorting_field."` ".
            "LIMIT ".( ( $page_num - 1 ) * self::TASKS_PER_PAGE ).", ".self::TASKS_PER_PAGE
        );
    }
	
	public function createTask( $task_data ){
		return $this->db->query(
			"INSERT INTO `".$this->table_name."` ".
            "SET `username` = '".$this->db->real_escape_string( $task_data["user"] )."', ".
                "`email` = '".$this->db->real_escape_string( $task_data["mail"] )."', ".
                "`task` = '".$this->db->real_escape_string( $task_data["text"] )."', ".
				"`hash` = '".md5( date("YmdHis").$task_data["user"].$task_data["mail"] )."', ".
                "`is_completed` = ".( ( $task_data["done"] ) ? 1 : 0 )
		);
	}
	
	public function updateTask( $task_data ){
		return $this->db->query(
			"UPDATE `".$this->table_name."` ".
            "SET `task` = '".$this->db->real_escape_string( $task_data["text"] )."', ".
				"`is_completed` = ".( ( $task_data["done"] ) ? 1 : 0 )." ".
			"WHERE `hash` = '".$this->db->real_escape_string( $task_data["task"] )."'"
		);
	}

    public function getTaskPagesCount(){
        $tasks_count = $this->db->query(
            "SELECT COUNT(`id`) AS `count` ".
            "FROM `tasks`"
        )->fetch_object()->count;

        return ceil( $tasks_count / self::TASKS_PER_PAGE );
    }

}
?>