<?php

namespace App\Controller\Widget\Category;

use \PDO;
use \App\Utils\View;
use \App\Model\Entity\Category;

class CategoryList {


    /**
     * Get and returns all products that should be displayed on widget
     *
     * @return string
     */
    private static function getCategoriesList() {
        $list = '';

        $products = Category::getCategories(null,'id ASC', '6')->fetchAll(PDO::FETCH_ASSOC);


        foreach($products as $product) {
            $list .= View::render('/category/item', [
                'category_name' => $product['name'],
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
        $widget =  View::render('widget/category-list', [
            'items' => self::getCategoriesList()
        ]);

        return $widget;
    }
}
