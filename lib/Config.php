<?php

class Config{

    private $host = 'localhost';
    private $dbname = 'bedeker';
    private $charset = 'utf8';
    private $username = 'bedeker';
    private $password = 'almuslupus2009';
    private static $instance;

    private function __construct(){}

    public static function getConfigInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Config;
        }
        return self::$instance;
    }

    public function getConfig(){
        return $this;
    }

    public function getHost(){
        return $this->host;
    }

    public function getDbName(){
        return $this->dbname;
    }

    public function getCharset(){
        return $this->charset;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }
}
?>