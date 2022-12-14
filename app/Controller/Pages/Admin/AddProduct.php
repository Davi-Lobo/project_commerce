<?php

namespace App\Controller\Pages\Admin;

use \App\Utils\View;
use \App\Model\Entity\Product;
use \App\Model\Entity\Category;

class AddProduct extends Admin {
    
    /**
     * Returns the view content for the page
     * @return string
     */
    public static function getPageContent() {
        $content =  View::render('pages/admin/product/add', [
            'category_options' => Category::getCategoriesOptions()
        ]);

        return parent::getPage('page-admin','Zleeb Commerce - Adicionar produto', $content);
    }

    /**

     * @param Request $request
     * @return string
     */
    public static function addProduct($request) {
        $postVars = $request->getPostVars();

        $product = new Product(
            $postVars['name'],
            $postVars['code'],
            $postVars['stock'],
            $postVars['price'],
            $postVars['special_price'],
            $postVars['category'],
            0,
            $postVars['short_description'],
            $postVars['long_description'],
        );

        $product->add();

        return self::getPageContent();
    }
}
