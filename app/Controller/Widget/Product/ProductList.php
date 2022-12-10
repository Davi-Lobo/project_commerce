<?php

namespace App\Controller\Widget\Product;

use \PDO;
use \App\Utils\View;
use \App\Model\Entity\Product;

class ProductList {


    /**
     * Get and returns all products that should be displayed on widget
     *
     * @return string
     */
    private static function getProductsList() {
        $list = '';

        $products = Product::getProducts(null,'id ASC')->fetchAll(PDO::FETCH_ASSOC);


        foreach($products as $product) {
            $list .= View::render('/product/item', [
                'name' => $product['name'],
                'price' => $product['price'],
                'special_price' => $product['special_price']
            ]);
        }
    
        return $list;
    }
    
    /**
     * Returns the widget content
     * 
     * @return string
     */
    public static function getWidgetContent() {
        $widget =  View::render('widget/product-list', [
            'widget_name' => 'widget-products',
            'items' => self::getProductsList()
        ]);

        return $widget;
    }
}
