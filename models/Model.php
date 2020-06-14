<?php
namespace app\models;

use app\interfaces\ModelInterface;
use app\services\Db;

abstract class Model implements ModelInterface
{
    protected $tableName;
    protected $db = null;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->tableName = $this->getTableName();
    }

    public function getById(int $id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->queryOne($sql, get_class($this), ['id' => $id]);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryAll($sql, get_class($this));
    }

    abstract public function getParamsForDb();

    public function addToDb(){
        $paramsForDb = $this->getParamsForDb();
        $set = [];
        foreach ($paramsForDb as $key => $value) {
            $set[] = $key . '= :' . $key;
        }
        $set = implode(",", $set);

        $sql = "INSERT INTO {$this->tableName} SET {$set}";

        return $this->db->execute($sql, $paramsForDb);
    }

    public function updateInDb(){
        $paramsForDb = $this->getParamsForDb();
        $set = [];
        foreach ($paramsForDb as $key => $value) {
            $set[] = $key . '= :' . $key;
        }
        $set = implode(",", $set);

        $sql = "UPDATE {$this->tableName}
                SET {$set}
	            WHERE id = {$this->id}";

        return $this->db->execute($sql, $paramsForDb);
    }

    public function deleteById(int $id){
        $sql = "DELETE FROM {$this->tableName}
	    WHERE id = :id";
        return $this->db->execute($sql, ['id' => $id]);
    }
}