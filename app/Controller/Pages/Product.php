<?php

namespace App\Controller\Pages;

use \PDO;
use \App\Utils\View;
use \App\Model\Entity\Product as ProductModel;

class Product extends Page {
    
    /**
     * Returns the view content for the home page
     * 
     * @return string
     */
    public static function getPageContent($productId) {
        $product = ProductModel::getProducts('id = '.$productId)->fetch(PDO::FETCH_ASSOC);

        $content =  View::render('pages/product', [
            'id' => $product['id'],
            'name' => $product['name'],
            'code' => $product['code'],
            'price' => number_format($product['price'], 2, ',', '.'),
            'special_price' => number_format($product['special_price'], 2, ',', '.'),
            'short_description' => $product['short_description'],
            'long_description' => $product['long_description']
        ]);

        return parent::getPage('common-layout -product', 'Produto - '.$product['name'], $content);
    }
}