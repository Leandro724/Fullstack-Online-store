<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Products.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate product object
  $product = new Product($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $product->Prod_Name = $data->Prod_Name;
  $product->Prod_Price = $data->Prod_Price;
  $product->Prod_Description = $data->Prod_Description;
  $product->Prod_Img_1 = $data->Prod_Img_1;
  $product->Prod_Img_2 = $data->Prod_Img_2;
  $product->Prod_Img_3 = $data->Prod_Img_3;
  $product->Cat_id = $data->Cat_id;

  // Create Product
  if($product->create()) {
    echo json_encode(
      array('message' => 'Product Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Product Not Created')
    );
  }

