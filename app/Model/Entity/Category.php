<?php 

namespace App\Model\Entity;

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
}