<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Common\Database;

class AddProduct extends Page {
    
    /**
     * Returns the view content for the about page
     * @return string
     */
    public static function getPageContent() {
        $content =  View::render('pages/add_product', [
      
        ]);

        return parent::getPage('Cadastrar Produto', $content);
    }
}
