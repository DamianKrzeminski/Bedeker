<?php
class Client{
    private $id;
    private $client;
    private $tag;
    private $arch;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setClient($client){
        $this->client = $client;
    }

    public function getClient(){
        return $this->client;
    }

    public function setTag($tag){
        $this->tag = $tag;
    }

    public function getTag(){
        return $this->tag;
    }

    public function setArch($arch){
        $this->arch = $arch;
    }

    public function getArch(){
        return $this->arch;
    }

    public function getObjectVars(){
        return get_object_vars($this);
    }
}
?>