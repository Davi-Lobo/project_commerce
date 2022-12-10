<?php

namespace App\Controller\Pages\Admin;

use \App\Utils\View;
use \App\Model\Entity\Category;
use \App\Controller\Widget\Category\CategoryList;

class AddCategory extends \App\Controller\Pages\Page {
    
    /**
     * Returns the view content for the page
     * 
     * @return string
     */
    public static function getPageContent() {
        $content =  View::render('pages/admin/category/add', [
            'category_list' => CategoryList::getWidgetContent()
        ]);

        return parent::getPage('common-layout','Cadastrar Categoria', $content);
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
