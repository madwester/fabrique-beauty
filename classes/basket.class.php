<?php 
class Basket extends Database {
    public $basket = array();
    private $account_id;
    private $basket_id;
    public $errors = array();
    
    public function __construct( $account_id = NULL ){
        parent::__construct();
        if( empty ( $account_id ) ){
            return false;
        }
        else{
            $this -> account_id = $account_id;
            $this -> createBasket();
        }
    }
    private function createBasket(){
        //creating a new basket
        $query_create = "INSET INTO basket (account_id) VALUES (?)";
        $statement = $this -> connection -> prepare ( $query_create );
        $statement -> bind_param ( "i", $this -> account_id );
        if ( $statement -> execute() ){
            $this -> $basket_id = $this -> connection -> insert_id;
            return true;
        }
        else {
            $error_code = $this -> connection -> errno;
            if($error_code == "1062"){
                $this -> getListId();
            }
        }
    }
    private function getBasketId(){
        $query_list = "SELECT basket_id FROM basket WHERE account_id=?";
        $statement = $this -> connection -> prepare( $query_list );
        $statement -> bind_param( "i", $this -> account_id );
        if( $statement -> execute() == false ){
            return false;
        }
        else{
            $result = $statement -> get_result();
            $row = $result -> fetch_assoc();
            $this -> list_id = $row["basket_id"];
            return $row["basket_id"];
        }
    }
    public function addItem( $product_id ){
        $query_add = "INSERT INTO 
        basket_items 
        (basket_id, product_id) VALUES (?, ?)";
        if($this -> list_id){
            $statement = $this -> conn -> prepare($query);
            $statement -> bind_param("ii", $this->list_id, $product_id);
            if( $statement -> execute() ){
                return true;
            }
        }
        else{
            //no list exist
            return false;
        }
    }
    public function removeItem( $product_id ){
        
    }
}
?>