<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Home extends Page {
    
    /**
     * Returns the view content for the home page
     * 
     * @return string
     */
    public static function getPageContent() {
        $content =  View::render('pages/home', [

        ]);

        return parent::getPage('page-home', 'Zleeb Commerce - Página Inicial', $content);
    }
}