<?php

namespace App\Controller\Pages\Admin;

use \PDO;
use \App\Utils\View;
use \App\Model\Entity\Category;
use \App\Model\Entity\Product;

class EditProduct extends Admin {
    
    /**
     * Returns the view content for the page
     * 
     * @return string
     */
    public static function getPageContent($productId, $message = '') {
        $product = Product::getProducts('id = '.$productId)->fetch(PDO::FETCH_ASSOC);

        $content =  View::render('pages/admin/product/edit', [
            'id' => $product['id'],
            'name' => $product['name'],
            'code' => $product['code'],
            'stock' => $product['stock'],
            'price' => $product['price'],
            'special_price' => $product['special_price'],
            'category_id' => $product['category_id'],
            'short_description' => $product['short_description'],
            'long_description' => $product['long_description'],
            'message' => $message,
            'category_options' => Category::getCategoriesOptions()
        ]);

        return parent::getPage('page-admin','Editar Produto', $content);
    }

    /**

     * @param Request $request
     * @return string
     */
    public static function updateProduct($request, $id) {
        $postVars = $request->getPostVars();

        Product::update($id, $postVars);

        $successMessage = '
            <div class="success-message">
                <span>O produto foi atualizado com sucesso.</span>
            </div>';

        return self::getPageContent($id, $successMessage);
    }
}
