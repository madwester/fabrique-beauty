<?php 
class Products extends Database {
    
    private $category;
    
    public function __construct(){
        //calling the parent's construct method
        parent::__construct();
        
        if($_GET["cat_id"]){
            $this -> category = $_GET["cat_id"];
            //write a query that shows all products with category 4
        }
        
    }
    //TO DO: BUILD FUNCTION: get products by category and then pass the categoryid as a argument
    public function getProductsByCategory(){
        $query = "SELECT products.product_id, 
                    products.name, 
                    products.description, 
                    products.brand, 
                    products.price, 
                    products.image
                    FROM products
                    INNER JOIN products_categories 
                    ON products.product_id = products_categories.product_id
                    INNER JOIN categories
                    ON products_categories.category_id = categories.category_id
                    WHERE products_categories.category_id = ?
                    OR categories.parent = ?
                    GROUP BY products.product_id";
        $statement = $this -> connection -> prepare( $query );
        $statement -> bind_param( "ii", $this -> category, $this -> category );
        
        if( $statement -> execute() == false ){
            error_log(0,"failed to get productby category");
            return false;
        }
        else{
            //$statement -> execute() == true
            $result = $statement -> get_result();
            if( $result -> num_rows == 0){
                //category does not exist
                return false;
            }
          else{
            //loop through result
            $products = array();
            while( $row = $result -> fetch_assoc() ){
              array_push( $products, $row );
            }
            return $products;
          }
        }
        $statement -> close();
        }
    //get all products from databse
    public function getProducts() {
        $query =    "SELECT products.product_id, 
                    products.name, 
                    products.description, 
                    products.brand, 
                    products.price, 
                    products.image, 
                    categories.category_name
                    FROM products
                    INNER JOIN products_categories 
                    ON products.product_id = products_categories.product_id
                    INNER JOIN categories 
                    ON products_categories.category_id = categories.category_id
                    GROUP BY products.product_id";
        $statement2 = $this -> connection -> prepare( $query );
        if( $statement2 -> execute() ){
            $result = $statement2 -> get_result();
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
        $statement2 -> close();
    }

    //get a single product by its id
    public function getProductById($product_id){
    $query =    "SELECT products.product_id AS id, 
                products.name AS name, 
                products.description AS description, 
                products.price AS price, 
                products.brand AS brand,
                products.size AS size,
                products.image AS image
                FROM products
                INNER JOIN products_categories ON products.product_id = products_categories.product_id
                INNER JOIN categories ON products_categories.category_id = categories.category_id
                WHERE products.product_id=?
                AND products.active =0";
    $statement = $this -> connection -> prepare( $query );
    $statement -> bind_param( "i", $product_id );
    if( $statement -> execute() == false ){
      error_log(0,"failed to get productbyid");
      return false;
    }
    else{
      $result = $statement -> get_result();
      if( $result -> num_rows == 0){
        //product does not exist
        return false;
      }
      else{
        //loop through result
        $product_info = array();
        while( $row = $result -> fetch_assoc() ){
          array_push( $product_info, $row );
        }
        return $product_info;
      }
    }
    $statement -> close();
    }
    
    //get all featured products for home page
    public function getTopProducts(){
        $query = "SELECT products.product_id, 
                products.name, 
                products.description, 
                products.brand, 
                products.price, 
                products.image, 
                products.featured,
                categories.category_name
                FROM products
                INNER JOIN products_categories 
                ON products.product_id = products_categories.product_id
                INNER JOIN categories 
                ON products_categories.category_id = categories.category_id
                WHERE products.featured = 1
                GROUP BY products.product_id";
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
