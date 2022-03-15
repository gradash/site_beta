<?php

$formData = $_POST;

$product = new $formData["productType"]($formData);

try {
    $product->persist();
    header('Location: /');

} catch (Exception $e) {
    echo "Sorry, this SKU already exists.";
}
