<?php

// Headers
header(
    'Access-Control-Allow-Origin: https://scandiweb-test-task-yoda.netlify.app'
);
header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');


include_once "../../config/Database.php";
include_once "../../models/Product.php";

// Instantiate DB & connect
$database = new Database(parse_url(getenv("CLEARDB_DATABASE_URL")));
$db       = $database->connect();

// Instantiate blog post object
$product = new ProductCollection($db);

// Blog post query
$result = $product->read();
$num    = $result->rowCount();

if ($num > 0) {
    $products_arr         = array();
    $products_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $product_item           = array(
            'id'        => $id,
            'SKU'       => $SKU,
            'name'      => $name,
            'price'     => $price,
            'attribute' => $attribute,
            'value'     => $value,
            'unit'      => $unit,
        );
        $products_arr['data'][] = $product_item;
    }
    echo json_encode($products_arr);
} else {
    echo json_encode(["msg" => "No products"]);
}

// Che
