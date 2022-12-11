<?php

namespace App\Controller\Pages;

use \PDO;
use \App\Utils\View;
use \App\Model\Entity\Category as CategoryModel;
use \App\Controller\Widget\Product\ProductList;

class Category extends Page {
    
    /**
     * Returns the view content for the home page
     * 
     * @return string
     */
    public static function getPageContent($categoryId) {
        $category = CategoryModel::getCategories('id = '.$categoryId)->fetch(PDO::FETCH_ASSOC);

        $products = ProductList::getWidgetContent($category['name'], 'category_id = '.$categoryId);

        $content =  View::render('pages/category', [
            'products_list' => $products
        ]);

        return parent::getPage('common-layout -product', 'Zleeb Commerce - '.$category['name'], $content);
    }
}