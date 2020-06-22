<?php
namespace app\models;

use app\interfaces\IRecord;
use app\services\Db;

abstract class Record implements IRecord
{
    protected $db = null;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

//    public function getById(int $id)
//    {
//        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
//        return $this->db->queryOneObject($sql, get_called_class(), [':id' => $id]);
//    }
//
//    public function getAll()
//    {
//        $sql = "SELECT * FROM {$this->tableName}";
//        return $this->db->queryAllObjects($sql, get_called_class());
//    }

    abstract public function getParamsForDb();

    public function insert(){
        $tableName = static::getTableName();
        $paramsForDb = $this->getParamsForDb();
        $set = [];
        foreach ($paramsForDb as $key => $value) {
            $set[] = $key . '= :' . $key;
        }
        $set = implode(",", $set);

        $sql = "INSERT INTO {$tableName} SET {$set}";

        $this->db->execute($sql, $paramsForDb);
        $this->id = $this->db->getLastInsertId();

        return $this->id;
    }

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
	            WHERE id = {$this->id}";

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
	            WHERE id = {$this->id}";

        return $this->db->execute($sql, $paramsForDb);
    }

    public function delete(){
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName}
	    WHERE id = :id";
        return $this->db->execute($sql, [':id' => $this->id]);
    }

    public function save()
    {
        //$modelFromDb = $this->getById($this->id);
        $modelFromDb = \app\models\ModelFactory::getById(get_called_class(), $this->id);
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
}