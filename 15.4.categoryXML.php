<?php
/**
 * 4. Используя xml-файл с задания 3 
 * необходимо вывести информацию о категориях и товарах в следующем виде: 
 * Категория 1: список товаров данной категории(через запятую);
 * Категория 2: список товаров данной категории.
 */

$xmlFile = 'goods.xml';
//массив, в котором товары разбиты по категориям
$categoriesAndProducts = array();

$goods = simplexml_load_file($xmlFile);

foreach ($goods as $product) {
    $categoriesAndProducts[ (string) $product->category ][] = (string) $product->name;
}

foreach ($categoriesAndProducts as $category => $products) {
    echo '<p>';
    echo "Category '$category':<br>";
    echo implode(', ', $products);
    echo '</p>';
}
