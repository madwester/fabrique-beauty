<?php
class Database{
    protected $connection;
    public function __construct(){
        //get environment variables
        $host = getenv("host");
        $user = getenv("username");
        $password = getenv("password");
        $database = getenv("database");
        //create connection
        $this -> connection = mysqli_connect($host, $user, $password, $database);
    }
    public function getConnection(){
        return $this -> connection;
    }
    
}
?>