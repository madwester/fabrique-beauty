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
        //getting name of the current page
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
    
    public function getActiveCategory($id){
        $query =    "SELECT 
                    c1.category_id as parentid,
                    c1.category_name as parentname,
                    c2.category_id as child_id,
                    c2.category_name as child_name
                    FROM categories c1
                    INNER JOIN categories c2
                    ON c1.category_id = c2.parent
                    WHERE c2.category_id = ?";
                    $statement = $this -> connection -> prepare($query);
                    $statement -> bind_param("i", $id);
                    if($statement -> execute()){
                        $result = $statement -> get_result();
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
        //$activeCat = $this -> getActiveCategory($id);
        if($statement -> execute()){
            $result = $statement -> get_result(); //result is all of the data like a table, multiple rows
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    array_push($this -> subCategoryArray, $row);
                }
                return $this -> subCategoryArray;
            }
            else{
                $query = "SELECT * FROM categories WHERE parent = ( SELECT parent FROM categories WHERE category_id = ? )";
                $statement = $this -> connection -> prepare($query);
                $statement -> bind_param("i", $id);
                if($statement -> execute()){
                    $result = $statement -> get_result();
                    if($result -> num_rows > 0){
                        while($row = $result -> fetch_assoc()){
                            array_push($this -> subCategoryArray, $row);
                        }
                        return $this -> subCategoryArray;
                    }
                }
            }
        }
    }
    
    public function getNav(){
        
        $activePage;
        
        if (strpos($_SERVER['REQUEST_URI'], "cat_id=1") !== false){
        echo 'active page is face';
        $activePage = 1;
        } 
        else if (strpos($_SERVER['REQUEST_URI'], "cat_id=2") !== false){
        echo 'active page is body';
        $activePage = 2;
        } 
        else if (strpos($_SERVER['REQUEST_URI'], "cat_id=3") !== false){
        echo 'active page is hair';
        $activePage = 3;
        } 
        else if (strpos($_SERVER['REQUEST_URI'], "cat_id=4") !== false){
        echo 'active page is makeup';
        $activePage = 4;
        } 
        else {
        echo 'active page something else';
        }
        
        $nav_array = array();
        $nav_items = array("face","body","hair","makeup");
        if($activePage == 1){
            
        }
    }
}
?>