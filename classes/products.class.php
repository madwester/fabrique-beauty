<?php 
class Products extends Database {
    public function __construct(){
        //calling the parent's construct method
        parent::__construct();
    }
    public function getProducts() {
        //get all products from databse
        $query =    "SELECT
                    products.product_id,
                    products.name,
                    products.description,
                    products.brand,
                    products.price,
                    products.image,
                    categories.category_name
                    FROM products
                    INNER JOIN products_categories
                    ON product_id = products_categories.product_id
                    INNER JOIN categories
                    ON products_categories.category_id = categories.category_id GROUP BY products.product_id";
        $statement = $this -> connection -> prepare( $query );
        if( $statement -> execute() ){
            $result = $statement -> get_result();
            //check number of rows in result
            if( $result -> num_rows > 0 ){
                $products = array();
                while( $row = $result -> fetch_assoc() ){
                    array_push( $products, $row);
                }
                return $products;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
        //closing to free out memory
        $statement -> close();
    }
}
?>