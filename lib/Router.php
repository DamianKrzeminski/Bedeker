<?php
class Router{
    private $id;
    private $client;
    private $location;
    private $model;
    private $ip;
    private $operator;
    private $down;
    private $up;
    private $type;
    private $user;
    private $password;
    private $state;
    private $local_contact;
    private $operator_contact;
    private $role;
    private $snmp_password;
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

    public function setModel($model){
        $this->model = $model;
    }

    public function getModel(){
        return $this->model;
    }

    public function setIp($ip){
        $this->ip = $ip;
    }

    public function getIp(){
        return $this->ip;
    }

    public function setOperator($operator){
        $this->operator = $operator;
    }

    public function getOperator(){
        return $this->operator;
    }

    public function setDown($down){
        $this->down = $down;
    }

    public function getDown(){
        return $this->down;
    }

    public function setUp($up){
        $this->up = $up;
    }

    public function getUp(){
        return $this->up;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function getType(){
        return $this->type;
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

    public function setLocal_contact($local_contact){
        $this->local_contact = $local_contact;
    }

    public function getLocal_contact(){
        return $this->local_contact;
    }

    public function setOperator_contact($operator_contact){
        $this->operator_contact = $operator_contact;
    }

    public function getOperator_contact(){
        return $this->operator_contact;
    }

    public function setRole($role){
        $this->role = $role;
    }

    public function getRole(){
        return $this->role;
    }

    public function setSnmp_password($snmp_password){
        $this->snmp_password = $snmp_password;
    }

    public function getSnmp_password(){
        return $this->snmp_password;
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