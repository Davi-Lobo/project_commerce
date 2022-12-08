<?php 

namespace App\Model\Entity;

use \App\Common\Database;

class Product {

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $code;

    /**
     * @var integer
     */
    private $stock;

    /**
     * @var float
     */
    private $price;

    /**
     * @var float
     */
    private $specialPrice;

    /**
     * @var integer
     */
    private $categoryId;

    /**
     * @var integer
     */
    private $brandId;

    /**
     * @var string
     */
    private $shortDescription;

    /**
     * @var string
     */
    private $longDescription;

    /**
     * @var string
     */
    private $attributes;

    public function __construct($name,
                                $code,
                                $stock,
                                $price,
                                $specialPrice = 0,
                                $categoryId = 0,
                                $brandId = 0,
                                $shortDescription = '',
                                $longDescription = '',
                                $attributes = '') {
        $this->name = $name;
        $this->code = $code;
        $this->stock = $stock;
        $this->price = $price;
        $this->specialPrice = $specialPrice;
        $this->categoryId = $categoryId;
        $this->brandId = $brandId;
        $this->shortDescription = $shortDescription;
        $this->longDescription = $longDescription;
        $this->attributes = $attributes;
    }


    /**
     * @return boolean
     */
    public function add() {
        $database = new Database('catalog_products');

        $database->insert([
            'name' => $this->name,
            'code' => $this->code,
            'stock' => $this->stock,
            'price' => $this->price,
            'special_price' => $this->specialPrice,
            'category_id' => $this->categoryId,
            'brand_id' => $this->brandId,
            'short_description' => $this->shortDescription,
            'long_description' => $this->longDescription,
            'attributes' => $this->attributes,
        ]);
    }

    public function getName() {
        return $this->name;
    }
}