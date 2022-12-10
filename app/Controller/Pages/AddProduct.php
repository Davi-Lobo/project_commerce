<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Product;
use \App\Controller\Widget\Product\ProductList;

class AddProduct extends Page {
    
    /**
     * Returns the view content for the about page
     * 
     * @return string
     */
    public static function getPageContent() {
        $content =  View::render('pages/admin/product/add', [
            'product_list' => ProductList::getWidgetContent()
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
            0,
            0,
            $postVars['short-description'],
            $postVars['long-description'],
        );

        $product->add();

        return self::getPageContent();
    }
}
