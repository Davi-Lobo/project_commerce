<?php

namespace App\Controller\Pages\Admin;

use \PDO;
use \App\Utils\View;
use \App\Model\Entity\Product;
use \App\Model\Entity\Category;

class Dashboard extends Admin {

    /**
     * Get and returns all products that should be displayed on admin dashboard
     *
     * @return string
     */
    private static function getProductTableItems() {
        $list = '';

        $products = Product::getProducts(null,'id ASC')->fetchAll(PDO::FETCH_ASSOC);

        foreach($products as $product) {
            $list .= View::render('/pages/admin/product/item', [
                'id' => $product['id'],
                'name' => $product['name'],
                'code' => $product['code'],
                'stock' => $product['stock'],
                'price' => number_format($product['price'], 2, ',', '.'),
                'special_price' => number_format($product['special_price'], 2, ',', '.'),
                'category' => $product['category_id'] == 0 ? 'Default' : Category::getCategoryName('id = '. $product['category_id']),
                'short_description' => $product['short_description'],
                'long_description' => $product['long_description']
            ]);
        }
    
        return $list;
    }
    
    /**
     * Returns all product as table rows
     * 
     * @return string
     */
    public static function getProductTable() {
        $widget =  View::render('/pages/admin/product/table', [
            'product_items' => self::getProductTableItems()
        ]);

        return $widget;
    }

        /**
     * Get and returns all products that should be displayed on admin dashboard
     *
     * @return string
     */
    private static function getCategoriesTableItems() {
        $list = '';

        $categories = Category::getCategories(null,'id ASC')->fetchAll(PDO::FETCH_ASSOC);

        foreach($categories as $category) {
            $list .= View::render('/pages/admin/category/item', [
                'id' => $category['id'],
                'name' => $category['name'],
            ]);
        }
    
        return $list;
    }
    
    /**
     * Returns all product as table rows
     * 
     * @return string
     */
    public static function getCategoriesTable() {
        $widget =  View::render('/pages/admin/category/table', [
            'category_items' => self::getCategoriesTableItems()
        ]);

        return $widget;
    }

    /**
     * Returns the view content for the admin dashboard page
     * 
     * @return string
     */
    public static function getPageContent() {
        $content =  View::render('pages/admin/dashboard', [
            'table_products' => self::getProductTable(),
            'table_categories' => self::getCategoriesTable()
        ]);

        return parent::getPage('page-admin', 'Zleeb Commerce - Admin', $content);
    }
}