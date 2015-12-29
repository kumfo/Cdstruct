<?php
class Model {
    const link;
    public function __construct() {
        $db_config = App::$config['db'];
        try {
            self::link = new PDO('mysql:host='.$db_config['HOST'].';dbname='.$db_config['DB_NAME'], $db_config['UNAME'], $config['PASSWORD']);
        } catch($e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function model($class = __CLASS__) {
        new $class;
    }
    /**
     * @param sql 查询语句
     */
    public function query($sql) {
        try {
            $data = self::link->query($sql);
            return $data;
        } catch($e) {
            throw new Exception($e->getMessage());
        }
    }
    /**
     * 统计查询
     */
    public function count() {
    }
}