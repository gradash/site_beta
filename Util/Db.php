<?php
require_once "./Entity/Product.php";
require_once "./Entity/Dvd.php";
require_once "./Entity/Book.php";
require_once "./Entity/Furniture.php";

class DB
{
    private $user = "id18466934_pollux";
    private $pass = "sOEc&ErAxHS4o";
    private static $connection;

    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new PDO('mysql:host=localhost;dbname=id18466934_shop', $this->user, $this->pass);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public function persist(Persistable $object)
    {
        $keys = implode(",", array_keys($object->persistFields()));
        $values = ":" . implode(",:", array_keys($object->persistFields()));
        $query = 'INSERT ' . ' INTO ' . $object->persistTable() . ' (' . $keys . ') VALUES (' . $values . ')';
        $stmt = self::$connection->prepare($query);
        $stmt->execute($object->persistFields());

    }

    public function showAll()
    {
        $query = self::$connection->query('SELECT * FROM shopDB ORDER BY sku ASC');
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
        
        return $products;
    }

    public function massDelete($key)
    {
        $query = ('DELETE FROM shopDB WHERE id = (' . $key . ')');
        $stmt = self::$connection->prepare($query);
        $stmt->execute();

    }

}
