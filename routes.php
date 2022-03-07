<?php

require_once 'Router.php';
require_once 'Db.php';

Router::route('/', function () {
    require_once "productList.php";
});

Router::route('/add-product', function () {
    require_once "addProduct.php";
});

Router::route('/submit-product', function () {
    require_once "submitProduct.php";
});

Router::route('/mass-delete', function () {
    require_once "massDelete.php";
});

Router::run($_SERVER['REQUEST_URI']);
