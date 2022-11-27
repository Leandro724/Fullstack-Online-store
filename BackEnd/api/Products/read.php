<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Products.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $product = new Product($db);

  // Product query
  $result = $product->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $products_arr = array();
    // $products_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $product_item = array(
        'id' => $id,
        'Prod_Name' => $Prod_Name,
        'Prod_Price' => $Prod_Price,
        'Prod_Description' => html_entity_decode($Prod_Description),
        'Prod_Img_1' => $Prod_Img_1,
        'Prod_Img_2' => $Prod_Img_2,
        'Prod_Img_3' => $Prod_Img_3,
        'Cat_id' => $Cat_id,
        'Cat_Name' => $Category_Name
      );

      // Push to "data"
      array_push($products_arr, $product_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($products_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Products Found')
    );
  }
