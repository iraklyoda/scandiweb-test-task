<?php

// Headers
header('Access-Control-Allow-Origin: https://scandiweb-test-task-yoda.netlify.app');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once "../../config/Database.php";
include_once "../../models/Product.php";

