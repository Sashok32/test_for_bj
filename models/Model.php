<?php


namespace models;


/**
 * Class Model
 * @package models
 */
class Model
{

    /**
     * @return string
     */
    public static function tableName()
    {
        $table_name = static::class;
        $table_name = explode('\\', $table_name);
        $table_name = strtolower(end($table_name));
        return $table_name;
    }
//    protected static $connection;
//    public function __construct()
//    {
//        $this->connection = \MVC::getBase()->connection();
//    }


    /**
     * @return array
     */
    public static function findAll(array $params) {
        $table = static::tableName();

        $sql = "SELECT * FROM {$table} ";

        $sort = $params['sort'];
        if (!empty($sort)) {
            $direction = 'ASC';
            if (strpos($sort,'-') === 0) {
                $sort = substr($sort, 1);
                $direction = 'DESC';
            }
            $sql .= "ORDER BY {$sort} {$direction} ";
        }
        $limit = (int)$params['limit'];
        $offset = (int)$params['offset'] ?? 0;
        if (!empty($limit)) {
            $sql .= "LIMIT {$limit} OFFSET $offset";
        }
        return \MVC::getBase()->connection()->query($sql)->fetchAll();
    }
    public static function countAll() {
        $table = static::tableName();
        return \MVC::getBase()->connection()->query("SELECT COUNT(*) FROM {$table}")->fetchColumn();
    }

    public static function findOne($id) {
        $table = static::tableName();

        return \MVC::getBase()->connection()->query("SELECT * FROM {$table} where id = {$id}")->fetch();
    }

}