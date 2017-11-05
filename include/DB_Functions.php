<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB_Functions
 *
 * @author IoanDragk
 */
class DB_Functions {
    
    private $conn;
    
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }
    
     // destructor
    function __destruct() {
        
    }
    
    public function QueryForUser($username, $password) {
        
        $query = " SELECT * FROM users WHERE username = '$username'and password='$password'";
      
        $sql1=mysql_query($query);
        $row = mysql_fetch_array($sql1);
    
        if (!empty($row)) {
            $response["success"] = 1;
            $response["message"] = "You have been sucessfully logged in";
            return($response);
            }
        else {
            $response["success"] = 0;
            $response["message"] = "Invalid username or password";
            return($response);
        }
    }
}

?>