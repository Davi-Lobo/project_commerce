<?php

namespace App\Controller\Pages\Admin;

use \App\Utils\View;
use \App\Model\Entity\Product;
use \App\Model\Entity\Category;
use \App\Controller\Widget\Product\ProductList;

class AddProduct extends \App\Controller\Pages\Page {
    
    /**
     * Returns the view content for the page
     * @return string
     */
    public static function getPageContent() {
        $content =  View::render('pages/admin/product/add', [
            'product_list' => ProductList::getWidgetContent(),
            'category_options' => Category::getCategoriesOptions(),
        ]);

        return parent::getPage('common-layout','Cadastrar Produto', $content);
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
            $postVars['special-price'],
            $postVars['category'],
            0,
            $postVars['short-description'],
            $postVars['long-description'],
        );

        $product->add();

        return self::getPageContent();
    }
}
