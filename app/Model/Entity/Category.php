<?php 

namespace App\Model\Entity;

use \PDO;
use \App\Common\Database;

class Category {
    
    /**
     * @var string
     */
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }


    /**
     * @return boolean
     */
    public function add() {
        $database = new Database('catalog_categories');

        $database->insert([
            'name' => $this->name
        ]);

        return true;
    }

     /**
     * @return boolean
     */
    public static function update($id, $name) {
        $database = new Database('catalog_categories');

        $database->update('id ='.$id, [
            'name' => $name
        ]);

        return true;
    }

    /**
     * Returns a list of categories
     *
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public static function getCategories($where = null, $order = null, $limit = null, $fields = '*') {
        $database = new Database('catalog_categories');

        $results = $database->select($where, $order, $limit, $fields);

        return $results;
    }

    /**
     * Returns all categories as options for select fields
     *
     * @return string
     */
    public static function getCategoriesOptions() {
        $options = '';

        $items = self::getCategories(null, 'id ASC')->fetchAll(PDO::FETCH_ASSOC);

        foreach($items as $item) {
            $options .= '<option value="'.$item['id'].'">'.$item['name'].'</option>';
        }

        return $options;
    }

    /**
     * Returns a list of categories
     *
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public static function getCategoryName($where) {
        $database = new Database('catalog_categories');

        $results = $database->select($where)->fetch(PDO::FETCH_ASSOC)['name'];

        return $results;
    }
}