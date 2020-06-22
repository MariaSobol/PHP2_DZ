<?php


namespace app\models;


class ProductInCart extends Record
{
    protected $user_id;
    protected $product_id;
    protected $quantity;

    /**
     * ProductInCart constructor.
     * @param $user_id
     * @param $product_id
     * @param $quantity
     */
    public function __construct($user_id = null, $product_id = null, $quantity = null)
    {
        parent::__construct();
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public static function getTableName(): string
    {
        return "product_in_cart";
    }

    public function getParamsForDb()
    {
        return ['user_id' => $this->user_id,
                'product_id' => $this->product_id,
                'quantity' => $this->quantity];
    }

    //Переопределяем методы update(), delete(), save()
    public function update(){
        $tableName = static::getTableName();
        $paramsForDb = $this->getParamsForDb();
        $set = [];
        foreach ($paramsForDb as $key => $value) {
            $set[] = $key . '= :' . $key;
        }
        $set = implode(",", $set);

        $sql = "UPDATE {$tableName}
                SET {$set}
	            WHERE user_id = {$this->user_id} AND product_id = {$this->product_id}";
        return $this->db->execute($sql, $paramsForDb);
    }

    public function updateColumns(array $paramsForDb){
        $tableName = static::getTableName();
        $set = [];
        foreach ($paramsForDb as $key => $value) {
            $set[] = $key . '= :' . $key;
        }
        $set = implode(",", $set);

        $sql = "UPDATE {$tableName}
                SET {$set}
	            WHERE user_id = {$this->user_id} AND product_id = {$this->product_id}";

        return $this->db->execute($sql, $paramsForDb);
    }

    public function delete(){
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName}
	            WHERE user_id = {$this->user_id} AND product_id = {$this->product_id}";
        return $this->db->execute($sql);
    }

    public function save()
    {
        $modelFromDb = \app\models\ModelFactory::getByIds(get_called_class(), [
                                                                                'user_id' => $this->user_id,
                                                                                'product_id' => $this->product_id
                                                                               ]);
        if(is_null($modelFromDb)){
            return($this->insert());
        }
        else{
            $paramsForDb = [];
            foreach ($this as $key => $value) {
                if($modelFromDb->$key != $value) {
                    $paramsForDb[$key] = $value;
                }
            }
            return $this->updateColumns($paramsForDb);
        }
    }


    /**
     * @return null
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param null $user_id
     * @return null
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return null
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param null $product_id
     * @return null
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
        return $this;
    }

    /**
     * @return null
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param null $quantity
     * @return null
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
}