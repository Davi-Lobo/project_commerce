<?php

namespace App\Controller\Pages\Admin;

use \PDO;
use \App\Utils\View;
use \App\Model\Entity\Category;

class EditCategory extends Admin {
    
    /**
     * Returns the view content for the page
     * 
     * @return string
     */
    public static function getPageContent($categoryId, $message = '') {
        $category = Category::getCategories('id = '.$categoryId)->fetch(PDO::FETCH_ASSOC);

        $content =  View::render('pages/admin/category/edit', [
            'name' => $category['name'],
            'message' => $message
        ]);

        return parent::getPage('page-admin','Editar Categoria', $content);
    }

    /**

     * @param Request $request
     * @return string
     */
    public static function updateCategory($request, $id) {
        $postVars = $request->getPostVars();

        Category::update($id, $postVars['name']);

        $successMessage = '
            <div class="success-message">
                <span>A categoria foi atualizada com sucesso.</span>
            </div>';

        return self::getPageContent($id, $successMessage);
    }
}
