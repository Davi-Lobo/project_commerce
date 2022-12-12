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
    private static function getProductsList($where = null) {
        $list = '';

        $products = Product::getProducts($where,'id ASC')->fetchAll(PDO::FETCH_ASSOC);

        if(empty($products)) {
            return 'empty';
        }     

        foreach($products as $product) {
            $list .= View::render('/product/item', [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => number_format($product['price'], 2, ',', '.'),
                'special_price' => number_format($product['special_price'], 2, ',', '.')
            ]);
        }
    
        return $list;
    }
    
    /**
     * Returns the widget content
     * 
     * @return string
     */
    public static function getWidgetContent($title, $where = null) {
        $products = self::getProductsList($where);

        if ($products == 'empty') {
            return 'Não há produtos cadastrados';
        }

        $widget =  View::render('widget/product-list', [
            'title' => $title,
            'items' => self::getProductsList($where)
        ]);

        return $widget;
    }
}
