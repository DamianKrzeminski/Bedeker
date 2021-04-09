<?php
class User{
    private $id;
    private $login;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $privilege;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getLogin(){
        return $this->login;
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

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPrivilege($privilege){
        $this->privilege = $privilege;
    }

    public function getPrivilege(){
        return $this->privilege;
    }

    public function getObjectVars(){
        return get_object_vars($this);
    }
}
?>