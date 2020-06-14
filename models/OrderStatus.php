<?php


namespace app\models;


class OrderStatus extends Model
{
    protected $id;
    protected $status;

    public function getTableName(): string
    {
        return "order_status";
    }

    public function getParamsForDb()
    {
        return ['status' => $this->status];
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return mixed
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

}