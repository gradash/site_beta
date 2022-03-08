<?php

require_once '/Controllers/Router.php';
require_once '/Util/Db.php';

Router::route('/', function () {
    require_once "/Views/productList.php";
});

Router::route('/add-product', function () {
    require_once "/Views/addProduct.php";
});

Router::route('/submit-product', function () {
    require_once "/Controllers/submitProduct.php";
});

Router::route('/mass-delete', function () {
    require_once "/Controllers/massDelete.php";
});

Router::run($_SERVER['REQUEST_URI']);
