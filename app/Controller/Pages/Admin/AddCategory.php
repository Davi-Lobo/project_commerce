<?php

namespace App\Controller\Pages\Admin;

use \App\Utils\View;
use \App\Model\Entity\Category;

class AddCategory extends Admin {
    
    /**
     * Returns the view content for the page
     * 
     * @return string
     */
    public static function getPageContent() {
        $content =  View::render('pages/admin/category/add', [
            
        ]);

        return parent::getPage('page-admin','Cadastrar Categoria', $content);
    }

    /**

     * @param Request $request
     * @return string
     */
    public static function addCategory($request) {
        $postVars = $request->getPostVars();

        $category = new Category($postVars['name']);

        $category->add();

        return self::getPageContent();
    }
}
