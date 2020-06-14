<?php


namespace app\models;


class ProductCategory extends Model
{
    protected $id;
    protected $category;

    public function getTableName(): string
    {
        return "product_category";
    }

    public function getParamsForDb()
    {
        return ['category' => $this->category];
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
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     * @return mixed
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }



}