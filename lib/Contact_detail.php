<?php
class Contact_detail{
    private $id;
    private $client;
    private $firstname;
    private $lastname;
    private $phone;
    private $mobile_phone;
    private $email;
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

    public function setFirstname($firstname){
        $this->firstname = $firstname;
    }

    public function getFirstname(){
        return $this->firstname;
    }

    public function setLastname($lastname){
        $this->lastname = $lastname;
    }

    public function getLastname(){
        return $this->lastname;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function setMobile_phone($mobile_phone){
        $this->mobile_phone = $mobile_phone;
    }

    public function getMobile_phone(){
        return $this->mobile_phone;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
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