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

     // // Get Single Product
     public function read_single() {
        // Create query
        $query = 'SELECT c.Cat_Name as Category_Name, p.id, p.Cat_id, p.Prod_Name, p.Prod_Price, p.Prod_Description, p.Prod_Img_1, p.Prod_Img_2, p.Prod_Img_3
                                    FROM ' . $this->table . ' p
                                    LEFT JOIN
                                      category c ON p.Cat_id = c.id
                                    WHERE
                                      p.id = ?
                                    LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

      

        // Set properties
        $this->Prod_Name = $row['Prod_Name'];
        $this->Prod_Description = $row['Prod_Description'];
        $this->Prod_Price = $row['Prod_Price'];
        $this->Prod_Img_1 = $row['Prod_Img_1'];
        $this->Prod_Img_2 = $row['Prod_Img_2'];
        $this->Prod_Img_3 = $row['Prod_Img_3'];
        $this->Cat_id = $row['Cat_id'];
        $this->Category_Name = $row['Category_Name'];
  }


  // Create Product
  public function create() {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' 
        SET
         Prod_Name = :Prod_Name, 
         Prod_Description = :Prod_Description, 
         Prod_Price = :Prod_Price, 
         Prod_Img_1 = :Prod_Img_1, 
         Prod_Img_2 = :Prod_Img_2, 
         Prod_Img_3 = :Prod_Img_3, 
         Cat_id = :Cat_id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data (Sanitizing Data)
        $this->Prod_Name = htmlspecialchars(strip_tags($this->Prod_Name));
        $this->Prod_Description = htmlspecialchars(strip_tags($this->Prod_Description));
        $this->Prod_Price = htmlspecialchars(strip_tags($this->Prod_Price));
        $this->Prod_Img_1 = htmlspecialchars(strip_tags($this->Prod_Img_1));
        $this->Prod_Img_2 = htmlspecialchars(strip_tags($this->Prod_Img_2));
        $this->Prod_Img_3 = htmlspecialchars(strip_tags($this->Prod_Img_3));
        $this->Cat_id = htmlspecialchars(strip_tags($this->Cat_id));


        // Bind data
        $stmt->bindParam(':Prod_Name', $this->Prod_Name);
        $stmt->bindParam(':Prod_Description', $this->Prod_Description);
        $stmt->bindParam(':Prod_Price', $this->Prod_Price);
        $stmt->bindParam(':Prod_Img_1', $this->Prod_Img_1);
        $stmt->bindParam(':Prod_Img_2', $this->Prod_Img_2);
        $stmt->bindParam(':Prod_Img_3', $this->Prod_Img_3);
        $stmt->bindParam(':Cat_id', $this->Cat_id);

        // Execute query
        if($stmt->execute()) {
          return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

}

?>