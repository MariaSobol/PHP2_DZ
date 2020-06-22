<?php


namespace app\models;


class Order extends Record
{
    protected $id = 0;
    protected $user_id;
    protected $status_id;

    /**
     * Order constructor.
     * @param $user_id
     * @param $status_id
     */

    public function __construct($user_id = null, $status_id = null)
    {
        parent::__construct();
        $this->user_id = $user_id;
        $this->status_id = $status_id;
    }


    public static function getTableName(): string
    {
        return "orders";
    }

    public function getParamsForDb()
    {
        return ['user_id' => $this->user_id,
                'status_id' => $this->status_id];
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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     * @return mixed
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusId()
    {
        return $this->status_id;
    }

    /**
     * @param mixed $status_id
     * @return mixed
     */
    public function setStatusId($status_id)
    {
        $this->status_id = $status_id;
        return $this;
    }

}