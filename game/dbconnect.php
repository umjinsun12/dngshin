<?php

    class dbconnect
    {
        public $conn;
        
        function dbconnect(){
            
            $dbinfo = (object)array(
            'db_type' => 'mysql',
            'db_port' => '3306',
            'db_hostname' => '127.0.0.1',
            'db_userid' => 'root',
            'db_password' => '1234',
            'db_database' => 'gametest',    
            );
        
    
       $this->conn = mysql_connect($dbinfo->db_hostname, $dbinfo->db_userid, $dbinfo->db_password);
       
    
       }
    
       function getconn(){
            return $this->conn;
       }
    }      
?>