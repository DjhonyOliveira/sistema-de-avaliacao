<?php

namespace Source\Core;

class Connect
{

    private const options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
        \PDO::ATTR_CASE               => \PDO::CASE_NATURAL
    ];

    /** 
     * @var \PDO 
     */
    private static $instance;

    /**
     *  @return \PDO 
     */
    public static function getInstance(): \PDO
    {
        if(empty(self::$instance)){
            try{
                self::$instance = new \PDO(
                    "pgsql:host=" . CONF_DB_HOST . ";port=" . CONF_DB_PORT . ";dbname=" . CONF_DB_NAME,
                    CONF_DB_USER,
                    CONF_DB_PASS,
                    self::options
                );
            } catch(\PDOException $exception){
                die('Erro ao conectar!!!');
            }
        }

        return self::$instance;
    }

    private function __construct()
    {

    }

    private final function __clone()
    {

    }
}