<?php


namespace app\models\records;


use app\base\App;

class ModelFactory
{
    protected $db = null;

    public function __construct()
    {
        $this->db = App::getInstance()->connection;
    }

    public function getById(string $classname, int $id)
    {
        /*Проверяем приходит ли полное имя класса, влючающее namespace, или только само имя класса.
        Например, метод save() в классе Record передаёт имя класса через метод get_called_class(),
        который в свою очередь возвращает полное имя класса.
        В случае если приходит только имя добавляем пространство имён.*/
        if(stristr($classname, '\\') === false){
            $classname = "app\models\\records\\" . $classname;
        }

        if(class_exists($classname)){
            $sql = "SELECT * FROM {$classname::getTableName()} WHERE id = :id";
            return $this->db->queryOneObject($sql, $classname, [':id' => $id]);
        }
        return null;
    }

    public function getAll($classname)
    {
        if(stristr($classname, '\\') === false){
            $classname = "app\models\\records\\" . $classname;
        }

        if(class_exists($classname)){
            $sql = "SELECT * FROM {$classname::getTableName()}";
            return $this->db->queryAllObjects($sql, $classname);
        }
        return null;
    }

    //Метод для таблиц с составным первичным ключом
    public function getByIds(string $classname, array $ids)
    {
        if(stristr($classname, '\\') === false){
            $classname = "app\models\\records\\" . $classname;
        }

        if(class_exists($classname)){
            $params = [];
            foreach ($ids as $key => $value) {
                $params[] = $key . ' = :' . $key;
            }
            $params = implode(" AND ", $params);

            $sql = "SELECT * FROM {$classname::getTableName()} WHERE {$params}";
            return $this->db->queryOneObject($sql, $classname, $ids);
        }
        return null;
    }

    public function getOneByParam(string $classname, string $columnName, $value)
    {
        if(stristr($classname, '\\') === false){
            $classname = "app\models\\records\\" . $classname;
        }

        if(class_exists($classname)){
            $sql = "SELECT * FROM {$classname::getTableName()} WHERE $columnName = :value";
            return $this->db->queryOneObject($sql, $classname, [':value' => $value]);
        }
        return null;
    }

    public function getAllByParam(string $classname, string $columnName, $value)
    {
        if(stristr($classname, '\\') === false){
            $classname = "app\models\\records\\" . $classname;
        }

        if(class_exists($classname)){
            $sql = "SELECT * FROM {$classname::getTableName()} WHERE $columnName = :value";
            return $this->db->queryAllObjects($sql, $classname, [':value' => $value]);
        }
        return null;
    }
}