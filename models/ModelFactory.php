<?php


namespace app\models;


use app\services\Db;

class ModelFactory
{
    public static function getById(string $classname, int $id)
    {
        /*Проверяем приходит ли полное имя класса, влючающее namespace, или только само имя класса.
        Например, метод save() в классе Record передаёт имя класса через метод get_called_class(),
        который в свою очередь возвращает полное имя класса.
        В случае если приходит только имя добавляем пространство имён.*/
        if(stristr($classname, '\\') === false){
            $classname = "app\models\\" . $classname;
        }

        if(class_exists($classname)){
            $sql = "SELECT * FROM {$classname::getTableName()} WHERE id = :id";
            return Db::getInstance()->queryOneObject($sql, $classname, [':id' => $id]);
        }
        return null;
    }

    public static function getAll($classname)
    {
        if(stristr($classname, '\\') === false){
            $classname = "app\models\\" . $classname;
        }

        if(class_exists($classname)){
            $sql = "SELECT * FROM {$classname::getTableName()}";
            return Db::getInstance()->queryAllObjects($sql, $classname);
        }
        return null;
    }

    //Метод для таблиц с составным первичным ключом
    public static function getByIds(string $classname, array $ids)
    {
        if(stristr($classname, '\\') === false){
            $classname = "app\models\\" . $classname;
        }

        if(class_exists($classname)){
            $params = [];
            foreach ($ids as $key => $value) {
                $params[] = $key . ' = :' . $key;
            }
            $params = implode(" AND ", $params);

            $sql = "SELECT * FROM {$classname::getTableName()} WHERE {$params}";
            return Db::getInstance()->queryOneObject($sql, $classname, $ids);
        }
        return null;
    }

    public static function getByParam(string $classname, string $columnName, $value)
    {
        if(stristr($classname, '\\') === false){
            $classname = "app\models\\" . $classname;
        }

        if(class_exists($classname)){
            $sql = "SELECT * FROM {$classname::getTableName()} WHERE $columnName = :value";
            return Db::getInstance()->queryOneObject($sql, $classname, [':value' => $value]);
        }
        return null;
    }
}