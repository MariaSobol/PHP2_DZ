<?php


namespace app\models\records;

use app\base\App;

class ProductInOrder extends Record
{
    protected $product_id;
    protected $order_id;
    protected $quantity;

    /**
     * ProductInOrder constructor.
     * @param $product_id
     * @param $order_id
     * @param $quantity
     */
    public function __construct($product_id = null, $order_id = null, $quantity = null)
    {
        parent::__construct();
        $this->product_id = $product_id;
        $this->order_id = $order_id;
        $this->quantity = $quantity;
    }


    public static function getTableName(): string
    {
        return "product_in_order";
    }

    public function getParamsForDb()
    {
        return ['product_id' => $this->product_id,
                'order_id' => $this->order_id,
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
	            WHERE product_id = {$this->product_id} AND order_id = {$this->order_id}";
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
	            WHERE product_id = {$this->product_id} AND order_id = {$this->order_id}";

        return $this->db->execute($sql, $paramsForDb);
    }

    public function delete(){
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName}
	            WHERE product_id = {$this->product_id} AND order_id = {$this->order_id}";
        return $this->db->execute($sql);
    }

    public function save()
    {
        $modelFromDb = App::getInstance()->modelFactory->getByIds(get_called_class(), [
            'product_id' => $this->product_id,
            'order_id' => $this->order_id
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
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     * @return mixed
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     * @return mixed
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     * @return mixed
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

}