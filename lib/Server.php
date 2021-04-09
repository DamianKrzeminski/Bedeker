<?php
class Server{
    private $id;
    private $client;
    private $location;
    private $server_type;
    private $operation_system;
    private $server_role;
    private $ip;
    private $user;
    private $password;
    private $state;
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

    public function setLocation($location){
        $this->location = $location;
    }

    public function getLocation(){
        return $this->location;
    }

    public function setServer_type($server_type){
        $this->server_type = $server_type;
    }

    public function getServer_type(){
        return $this->server_type;
    }

    public function setOperation_system($operation_system){
        $this->operation_system = $operation_system;
    }

    public function getOperation_system(){
        return $this->operation_system;
    }

    public function setServer_role($server_role){
        $this->server_role = $server_role;
    }

    public function getServer_role(){
        return $this->server_role;
    }

    public function setIp($ip){
        $this->ip = $ip;
    }

    public function getIp(){
        return $this->ip;
    }

    public function setUser($user){
        $this->user = $user;
    }

    public function getUser(){
        return $this->user;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setState($state){
        $this->state = $state;
    }

    public function getState(){
        return $this->state;
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