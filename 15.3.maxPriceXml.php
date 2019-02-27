<?php
/**
 * Дан xml-файл с информацией о 10 товарах 
 * (Поля: наименование товара, категория товара, количество и цена). 
 * Найти товар с максимальной ценой 
 * и вывести всю информацию о данном товаре в файл “max_price.txt”
 */

$xmlFile = 'goods.xml';
$fileForSaveInfo = 'max_price.txt';

function findProductByMaxMinPrice($xmlFile, $goal = 'MAX') : string
{
    $goal = strtolower($goal);
    if ($goal != 'max' && $goal != 'min') {
        throw new Exception('ERROR: Invalid argument in function "findPrice()", second argument must be "MAX" or "MIN"');
    }

    $goods = simplexml_load_file($xmlFile);
    
    $countOfProducts = $goods->count();
    if ($countOfProducts == 0) {
        throw new Exception('NOTICE: XML-file does not contain products');
    } 

    $maxPrice = $minPrice = $goods[0]->product->price;
    $productNoWithMaxPrice = $productNoWithMinPrice = 0;
    for ($i = 1; $i < $countOfProducts; $i++) {
        if ((string) $goods->product[$i]->price > $maxPrice) {
            $maxPrice = $goods->product[$i]->price;
            $productNoWithMaxPrice = $i;
        }
        if ((string) $goods->product[$i]->price < $minPrice) {
            $minPrice = $goods->product[$i]->price;
            $productNoWithMinPrice = $i;
        }
    }

    return json_encode($goods->product[ ($goal == 'max')?$productNoWithMaxPrice:$productNoWithMinPrice ]);
}

try{
    echo $item = findProductByMaxMinPrice($xmlFile, 'MAX');
    file_put_contents($fileForSaveInfo, $item);
} catch (Exception $err) {
    echo $err->getMessage();
    echo ' on line: ' . $err->getLine();
}
