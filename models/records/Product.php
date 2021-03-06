<?php
namespace app\models\records;

class Product extends Record
{
    protected $id = 0;
    protected $name;
    protected $description;
    protected $price;
    protected $category_id;
    protected $imagelink;

    /**
     * Product constructor.
     * @param $name
     * @param $description
     * @param $price
     * @param $category_id
     * @param $imagelink
     */

    public function __construct($name = null, $description = null, $price = null, $category_id = 1, $imagelink = null)
    {
        parent::__construct();
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
        $this->imagelink = $imagelink;
    }


    public static function getTableName(): string
    {
        return "products";
    }

    public function getParamsForDb(): array
    {
        return ['name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'category_id' => $this->category_id,
                'imagelink' => $this->imagelink];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return mixed
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return mixed
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return mixed
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return mixed
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     * @return mixed
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImagelink()
    {
        return $this->imagelink;
    }

    /**
     * @param mixed $imagelink
     * @return mixed
     */
    public function setImagelink($imagelink)
    {
        $this->imagelink = $imagelink;
        return $this;
    }

}