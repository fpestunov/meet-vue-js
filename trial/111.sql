
/*

    3. Show Users, that had spent more than $1000

    - вычисляем стоимость заказов (orderitem) - достаем стоимость товаров (product) и
    группируем по заказам

    - затем делаем запрос с таблицей заказов (order)

    - группируем покупателей

    - выбираем тех кто потратил более $1000 (может во внутреннем запросе сначала отбросить их,
    а потом джойнить)

*/

SELECT orderitem.order_id, SUM(product.price) FROM orderitem
LEFT JOIN product ON orderitem.product_id = product.id
GROUP BY orderitem.order_id

SELECT orders.order_id, `ORDER`.customer_id, orders.total FROM
(
SELECT orderitem.order_id, SUM(product.price) AS total FROM orderitem
LEFT JOIN product ON orderitem.product_id = product.id
GROUP BY orderitem.order_id
) AS orders
LEFT JOIN `ORDER` ON orders.order_id = `ORDER`.id

SELECT `ORDER`.customer_id, SUM(orders.total) AS total
FROM
(
SELECT orderitem.order_id, SUM(product.price) AS total
FROM orderitem
LEFT JOIN product ON orderitem.product_id = product.id
GROUP BY orderitem.order_id
) AS orders
LEFT JOIN `ORDER` ON orders.order_id = `ORDER`.id
GROUP BY `ORDER`.customer_id

SELECT user.`name`, orders.total
FROM
(
SELECT `ORDER`.customer_id AS customer_id, SUM(orders.total) AS total
FROM
(
SELECT orderitem.order_id, SUM(product.price) AS total
FROM orderitem
LEFT JOIN product ON orderitem.product_id = product.id
GROUP BY orderitem.order_id
) AS orders
LEFT JOIN `ORDER` ON orders.order_id = `ORDER`.id
GROUP BY `ORDER`.customer_id
) orders
LEFT JOIN USER ON orders.customer_id = user.id
WHERE total > 1000


/*

    4. Show Stores, that have not any Sells

    - анализируем заказы (orderitem) - достаем товары и
    магазины в которых были продажи

    - затем делаем запрос с таблицей магазинов, чтобы
    определить, каких нет в этом списке
 */

SELECT DISTINCT product.store_id
FROM (
SELECT DISTINCT product_id
FROM orderitem) AS sold
LEFT JOIN product ON sold.product_id = product.id

explain SELECT s.name
FROM
(
SELECT DISTINCT p.store_id AS id
FROM (
SELECT DISTINCT product_id
FROM orderitem) AS o
LEFT JOIN product AS p ON o.product_id = p.id) AS active_store
RIGHT JOIN store AS s ON active_store.id = s.id
WHERE active_store.id IS NULL
