<?php

class Database{

    private static $instance;
    private $Database;

    private function __construct(){}

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Database();
        }
        return self::$instance;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
    }

    public function getDatabase(){
        if(isset($this->Database)){
            return $this->Database;
        }
        $parameters = Config::getConfigInstance()->getConfig();
        $database = new PDO('mysql:
            host='.$parameters->getHost().';
            dbname='.$parameters->getDbName().';
            charset=' . $parameters->getCharset() .'',
            $parameters->getUsername(),
            $parameters->getPassword()
        );
        $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $database;
    }

    public function save($table, $object){
        if($object->getId()){
            $set = $this->prepareSet($object);
            $query = $this->getDatabase()->prepare("UPDATE $table set $set WHERE id=:id");
        }else{
            $names = $this->prepareNames($object);
            $values = $this->prepareValues($object);
            $query = $this->getDatabase()->prepare("INSERT INTO $table ($names) VALUES ($values)");
        }
        
        $query = $this->bindParams($query, $object);
        return $query->execute();
    }

    private function prepareSet($object){
        foreach($object->getObjectVars() as $varName => $varValue){
            $set[] = "$varName=:$varName";
        }
        return implode(',', $set);
    }

    private function prepareNames($object){
        foreach($object->getObjectVars() as $varName => $varValue){
            if($varName != 'id'){
                $names[] = $varName;
            }
        }
        return implode(',', $names);
    }

    private function prepareValues($object){
        foreach($object->getObjectVars() as $varName => $varValue){
            if($varName != 'id'){
                $values[] = ":$varName";
            }
        }
        return implode(',', $values);
    }

    private function bindParams($query, $object){
        foreach($object->getObjectVars() as $varName => &$varValue){
            if(!$object->getId() && $varName == 'id'){
                continue;
            }
            $query->bindParam(":$varName", $varValue);
        }
        return $query;
    }
}
?>