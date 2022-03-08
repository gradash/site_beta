<?php

$db = new DB();

foreach (array_keys($_POST) as $productID) {

    $db->massDelete($productID);

}

header('Location: /');
