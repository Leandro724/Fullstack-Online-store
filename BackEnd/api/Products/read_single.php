<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Products.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate product object
  $product = new Product($db);

  // Get ID
  $product->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get product
  $product->read_single();

  // Create array
  $product_arr = array(
    'id' => $product->id,
    'Prod_Name' => $product->Prod_Name,
    'Prod_Price' => $product->Prod_Price,
    'Prod_Description' => $product->Prod_Description,
    'Prod_Img_1' => $product->Prod_Img_1,
    'Prod_Img_2' => $product->Prod_Img_2,
    'Prod_Img_3' => $product->Prod_Img_3,
    'Cat_id' => $product->Cat_id,
    'Cat_Name' => $product->Category_Name
  );

  // Make JSON
  print_r(json_encode($product_arr));