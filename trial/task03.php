<?php

class StoreManager
{
    /*
    * @var DatabaseManager $dbManager
    */
    protected $dbManager = null;

    /*
    * @param DatabaseManager $dbManager
    */
    public function __construct(DatabaseManager $dbManager)
    {
        $this->dbManager = $dbManager;
    }

    /*
    * @param int $storeId
    *
    * return float
    */
    public function calculateStoreEarnings(int $storeId): float
    {
        $totalAmount = 0;
        $tagCount = $this->getTotalUniqueTags();

        foreach ($this->getOrderProducts($storeId) as $product) {

            $tags = $this->getProductTags($product['id']);

            $amount = $product['amount'];
            $amount = $amount * (1 + count($tags) / $tagCount);

            foreach ($tags as $tag) {
                if ($tag['tag_name'] = 'Christmas') {
                    $amount = $amount * 1.01;
                }

                if ($tag['tag_name'] == 'Free') {
                    $amount = $amount * 0.5;
                }
            }

            $totalAmount += $amount;

        }

        return $totalAmount;
    }

    /*
    * @param int $storeId
    *
    * return array
    */
    protected function getOrderProducts(int $storeId): array
    {
        $query = "SELECT oi.product_id AS id, sum(p.price) AS amount FROM product AS p INNER JOIN orderitem AS oi ON oi.product_id = p.id WHERE p.store_id = :store GROUP BY oi.product_id";

        return $this->dbManager->getData($query, ['store' => $storeId]);
    }

    /*
    * @param int $storeId
    *
    * return array
    */
    protected function getProducts(int $storeId): array
    {
        $query = "SELECT * FROM product WHERE store_id = :store";

        return $this->dbManager->getData($query, ['store' => $storeId]);
    }

    /*
    * @param int $productId
    *
    * return array
    */
    protected function getOrderItems(int $productId): array
    {
        $query = "SELECT * FROM order_items WHERE product_id = :product";

        return $this->dbManager->getData($query, ['product' => $productId]);
    }

    /*
    * @param int $productId
    *
    * return array
    */
    protected function getProductTags(int $productId): array
    {
        $query = "SELECT * FROM tag WHERE id IN (SELECT tag_id FROM tagconnect WHERE product_id= :product)";

        return $this->dbManager->getData($query, ['product' => $productId]);
    }

    /*
    * return int
    */
    public function getTotalUniqueTags(): int
    {
        $query = "SELECT COUNT(DISTINCT tag_name) as count FROM tag";

        $result = $this->dbManager->getData($query, []);

        return $result['count'];
    }

}

// $tagCount = self::getTotalUniqueTags();
// кавычки в запросах
// public function getTotalUniqueTags() // убрали Static

// неверное названы поля в запросе и его можно оптимизировать
//$query = "SELECT COUNT(DISTINCT name) as count FROM tags";
// DISTINCT тоже можно опустить
// возращает всегда 1 запись, а не уникальные записи
// return $result['count'];

// public function calculateStoreEarnings(int $storeId)
//должен возвращать значение, но ничего не возращает!?

// можно добавить кэш...

//можно вместо * указать определенные поля

/*

explain SELECT oi.product_id, tc.tag_id, sum(p.price) AS total FROM product AS p
INNER JOIN orderitem AS oi ON oi.product_id = p.id
LEFT JOIN tagconnect AS tc ON tc.product_id = p.id
WHERE p.store_id = 5
GROUP BY oi.product_id, tc.tag_id

-- SELECT p.store_id, oi.order_id, oi.product_id, tc.tag_id, p.NAME, p.price FROM product AS p
-- INNER JOIN orderitem AS oi ON oi.product_id = p.id
-- LEFT JOIN tagconnect AS tc ON tc.product_id = p.id
-- WHERE p.store_id = 5

-- SELECT COALESCE(sum(price), 0) AS total FROM product AS p
-- INNER JOIN orderitem AS oi ON oi.product_id = p.id
-- WHERE p.store_id = 4

-- explain SELECT t.id, t.tag_name FROM tagconnect AS tc
-- INNER JOIN product AS p ON tc.product_id = p.id
-- LEFT JOIN tag AS t ON t.id = tc.tag_id
-- WHERE p.id =3

-- explain SELECT * FROM product AS p
-- INNER JOIN tagconnect AS t ON t.product_id = p.id
-- WHERE p.id =3


-- explain SELECT * FROM tag WHERE id IN (SELECT tag_id FROM tagconnect WHERE product_id= 2)

*/
