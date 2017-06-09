<?php
namespace components;


class  PDOUtil
{
    static private $instance;
    private $db;

    private function __construct()
    {
        $config = $this->getConfig();

        $this->db = new \PDO(
            "mysql:host={$config['mysql']['host']};
			dbname={$config['mysql']['dbname']}",
            $config['mysql']['user'],
            $config['mysql']['pass']
        );
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    private function getConfig()
    {
        return include(__DIR__ . '/../config/database.php');

    }

    public function obterConexao()
    {
        return $this->db;
    }

    static public function transacional($func)
    {
        $db = PDOUtil::getInstance()->obterConexao();
        try {

            $db->beginTransaction();
            call_user_func($func);
            $db->commit();
        } catch (\Exception $e) {
            var_dump($e);
            $db->rollBack();
        }
    }

    static public function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PDOUtil();
        }
        return self::$instance;
    }

}