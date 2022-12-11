<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Controller\Widget\Product\ProductList;

class Home extends Page {
    
    /**
     * Returns the view content for the home page
     * 
     * @return string
     */
    public static function getPageContent() {
        $content =  View::render('pages/home', [
            'products_widget' => ProductList::getWidgetContent('Veja nossos produtos'),
        ]);

        return parent::getPage('page-home', 'Zleeb Commerce - Página Inicial', $content);
    }
}