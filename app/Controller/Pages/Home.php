<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page {
    
    /**
     * Returns the view content for the home page
     * 
     * @return string
     */
    public static function getPageContent() {
        $organization = new Organization;

        $content =  View::render('pages/home', [
            'name' => $organization->name,
            'description' => $organization->description
        ]);

        return parent::getPage('page-home', 'Zleeb Commerce - Página Inicial', $content);
    }
}