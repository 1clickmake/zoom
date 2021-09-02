<?php
include_once('./_common.php');

class DB {
    private $dbHost     = G5_MYSQL_HOST;
    private $dbUsername = G5_MYSQL_USER;
    private $dbPassword = G5_MYSQL_PASSWORD;
    private $dbName     = G5_MYSQL_DB;
  
    public function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
  
    public function is_table_empty($mb_id) {
        $result = $this->db->query("SELECT id FROM zoom_token where mb_id = '{$mb_id}' ");
        if($result->num_rows) {
            return false;
        }
  
        return true;
    }
  
    public function get_access_token($mb_id='') {
        $sql = $this->db->query("SELECT access_token FROM zoom_token where mb_id = '{$mb_id}' ");
        $result = $sql->fetch_assoc();
        return json_decode($result['access_token']);
    }
  
    public function get_refersh_token($mb_id) {
        $result = $this->get_access_token($mb_id);
        return $result->refresh_token;
    }
  
    public function update_access_token($token, $mb_id) {
        $this->db->query(" delete from `zoom_token` where mb_id = '{$mb_id}' ");
        $this->db->query("INSERT INTO zoom_token(mb_id, access_token, date) VALUES('{$mb_id}', '{$token}', '".G5_TIME_YMDHIS."')");
    }
}