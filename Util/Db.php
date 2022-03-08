<?php
require_once "./Entity/Product.php";
require_once "./Entity/Dvd.php";
require_once "./Entity/Book.php";
require_once "./Entity/Furniture.php";

class DB
{
    private $user = "root";
    private $pass = "";
    private static $connection;

    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new PDO('mysql:host=localhost;dbname=myshop', $this->user, $this->pass);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public function persist(Persistable $object)
    {
        $keys = implode(",", array_keys($object->persistFields()));
        $values = ":" . implode(",:", array_keys($object->persistFields()));
        $query = 'INSERT ' . ' INTO ' . $object->persistTable() . ' (' . $keys . ') VALUES (' . $values . ')';
        //var_dump($object); die;
        $stmt = self::$connection->prepare($query);
        $stmt->execute($object->persistFields());

    }

    public function showAll()
    {
        $query = self::$connection->query('SELECT * FROM shopDB ORDER BY sku');
        $products = [];
        $all = $query->fetchAll();
        foreach ($all as $row) {
            if ($row['productType'] === 'Book') {
                $products[] = new Book($row);
            }
            if ($row['productType'] === 'DVD') {
                $products[] = new DVD($row);
            }
            if ($row['productType'] === 'Furniture') {
                $products[] = new Furniture($row);
            }

        }
        //var_dump($products);
        return $products;
    }

    public function massDelete($key)
    {
        $query = ('DELETE FROM shopDB WHERE id = (' . $key . ')');
        //var_dump($query); die;
        $stmt = self::$connection->prepare($query);
        $stmt->execute();

    }

}
