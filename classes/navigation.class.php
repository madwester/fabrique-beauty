<?php
class Navigation extends Database{
    private $logged_in; //tells if the user is logged in or not
    private $current_page;
    public $categoryArray = array();
    public $subCategoryArray = array();
    
    
    public function __construct(){
        parent::__construct();
        //check session to see if user is logged in
        if( isset($_SESSION["account_id"]) ){
            $this -> logged_in = true;   
        }
        else {
            $this -> logged_in = false; 
        }
        //get the name of the current page
        $this -> current_page = $_SERVER["PHP_SELF"];
    }
    
    public function getTopCategories(){
        $query = "SELECT * FROM categories WHERE parent = 0";
        $statement = $this -> connection -> prepare($query);
        if($statement -> execute()){
            $result = $statement -> get_result(); //result is all of the data like a table, multiple rows
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    array_push($this -> categoryArray, $row);
                }
            }
            
        }
        return $this -> categoryArray;
    }
    
    public function getSubCategories($id){
        $query = "SELECT * FROM categories WHERE parent = ?";
        $statement = $this -> connection -> prepare($query);
        $statement -> bind_param("i", $id);
        if($statement -> execute()){
            $result = $statement -> get_result(); //result is all of the data like a table, multiple rows
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    array_push($this -> subCategoryArray, $row);
                }
                return $this -> subCategoryArray;
            }
        }
    }
    }
?>