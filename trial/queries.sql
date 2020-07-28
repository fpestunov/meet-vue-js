-- 1. Show Stores, that have products with Christmas, Winter Tags

SELECT DISTINCT(s.name)
FROM (
SELECT DISTINCT(tc.product_id)
FROM tagconnect AS tc
LEFT JOIN tag AS t ON t.id = tc.tag_id
WHERE t.id IN (
SELECT id
FROM tag
WHERE tag_name IN ('Christmas', 'Winter'))
) AS t
INNER JOIN product AS p ON p.id = t.product_id
LEFT JOIN store AS s ON s.id = p.store_id


-- 4. Show Stores, that have not any Sells

SELECT name FROM
(SELECT DISTINCT(p.store_id) FROM orderitem AS o
INNER JOIN product AS p ON p.id = o.product_id
) AS o
right join store AS s ON s.id = o.store_id
WHERE store_id IS NULL


-- 5.  Show Mostly sold Tags

SELECT count(tc.tag_id) AS amount, t.tag_name AS tag
FROM product AS p
INNER JOIN orderitem AS oi ON oi.product_id = p.id
INNER JOIN tagconnect AS tc ON tc.product_id = p.id
LEFT JOIN tag AS t ON tc.tag_id = t.id
GROUP BY tc.tag_id
ORDER BY amount DESC


-- 6. Show Monthly Store Earnings Statistics

SELECT last_day(o.order_date) AS MONTH, s.NAME AS store, sum(p.price) AS total
FROM orderitem AS oi
INNER JOIN product AS p ON oi.product_id = p.id
INNER JOIN `order` AS o ON oi.order_id = o.id
LEFT JOIN store AS s ON s.id = p.store_id
GROUP BY MONTH, store
