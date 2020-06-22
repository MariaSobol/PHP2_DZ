<?php
namespace app\interfaces;

interface IRecord
{
    public static function getTableName(): string;

    public function insert();

    public function update();

    public function delete();

    public function save();
}