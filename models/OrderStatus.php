<?php


namespace app\models;


class OrderStatus extends Record
{
    protected $id = 0;
    protected $status;

    /**
     * OrderStatus constructor.
     * @param $status
     */
    public function __construct($status = null)
    {
        parent::__construct();
        $this->status = $status;
    }


    public static function getTableName(): string
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