<?php
class Session implements SessionInterface{

    public function setLoginSession($login){
        if(!isset($_SESSION['login']) && empty($_SESSION['login'])){
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }
    
    public function getLoginSession(){
        if(isset($_SESSION['login'])){
            return $_SESSION['login'];
        }
        return false;
    }

    public function logout(){
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
            return true;
        }
        return false;
    }
    
}
?>