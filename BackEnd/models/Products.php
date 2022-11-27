<?php
class Product {
    // DB stuff
    private $conn;
    private $table = 'products';

    // Post Properties
    public $id;
    public $Cat_id;
    public $Category_Name;
    public $Prod_Name;
    public $Prod_Price;
    public $Prod_Description;
    public $Prod_Img_1;
    public $Prod_Img_2;
    public $Prod_Img_3;
    

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Products
    public function read() {
      // Create query
      $query = 'SELECT c.Cat_Name as Category_Name, p.id, p.Cat_id, p.Prod_Name, p.Prod_Price, p.Prod_Description, p.Prod_Img_1, p.Prod_Img_2, p.Prod_Img_3
                                FROM ' . $this->table . ' p
                                LEFT JOIN
                                  category c ON p.Cat_id = c.id
                                ORDER BY
                                p.id ASC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
}

?>