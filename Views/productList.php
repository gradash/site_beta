<?php

require_once './Util/Db.php';

$db = new Db();
$products = $db->showAll();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Product List</title>
    <link rel="stylesheet" href="./Views/style.css">
</head>

<body>
    <header>
        <div class="headerContainer">
            <div class="headerName" text-align=left>
                Product List
            </div>
            <div class="headerButton">
                <button type="button" onclick="window.location.href='/add-product';">ADD</button>
                <button id="delete-product-btn" type="submit" form="form-mass-delete">MASS DELETE</button>
            </div>
        </div>
        <hr>
    </header>

    <form id="form-mass-delete" action="/mass-delete" method="POST">

        <div class="parent">
            <?php
foreach ($products as $product) {
    ?>
            <div class="child">

                <input class="delete-checkbox" name="<?=$product->getId()?>" type="checkbox" />
                <br /><br />

                <?=$product->getSku()?><br />
                <?=$product->getName()?><br />
                <?=$product->getPrice()?> $<br />

                <?php



if ($product->getProductType() === "DVD") {
        echo "Size:" . $product->getSize();

    }
    if ($product->getProductType() === "Book") {
        echo "Weight:" . $product->getWeight();

    }
    if ($product->getProductType() === "Furniture") {
        echo "Dimension:" . $product->getSize();

    }
    ?>
            </div>

            <?php
}
?>
        </div>

    </form>

    <footer class="footer">
        <?php require_once "footer.php";?>
    </footer>

</body>

</html>