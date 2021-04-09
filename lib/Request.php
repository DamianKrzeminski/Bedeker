<?php
class Request{
    
    private $action;
    private $id;
    private $client;
    private $search_item;
    private $subject;

    public function __construct(){
        $this->setAction();
        $this->setId();
        $this->setClient();
        $this->setSearch_item();
        $this->setSubject();
    }

    public function setAction(){
        if(isset($_GET['action']) && !empty($_GET['action'])){
            $this->action = $_GET['action'];
        }
        return $this;
    }

    public function getAction(){
        if(!isset($this->action)){
            $this->setAction();
        }
        return $this->action;
    }

    public function setId(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $this->id = $_GET['id'];
        }
        return $this;
    }

    public function getId(){
        if(!isset($this->id)){
            $this->setId();
        }
        return $this->id;
    }

    public function setClient(){
        if(isset($_GET['client']) && !empty($_GET['client'])){
            $this->client = $_GET['client'];
        }
        return $this;
    }

    public function getClient(){
        if(!isset($this->client)){
            $this->setclient();
        }
        return $this->client;
    }

    public function setSearch_item(){
        if(isset($_GET['search_item']) && !empty($_GET['search_item'])){
            $this->search_item = $_GET['search_item'];
        }
        return $this;
    }

    public function getSearch_item(){
        if(!isset($this->search_item)){
            $this->setSearch_item();
        }
        return $this->search_item;
    }

    public function setSubject(){
        if(isset($_GET['subject']) && !empty($_GET['subject'])){
            $this->subject = $_GET['subject'];
        }
        return $this;
    }

    public function getSubject(){
        if(!isset($this->subject)){
            $this->setSubject();
        }
        return $this->subject;
    }

    public function isPostSet(){
        if(isset($_POST) && !empty($_POST)){
            return true;
        }
        return false;
    }

    public function getPost(){
        if($this->isPostSet()){
            return $_POST;
        }
    }

    public function isSearchSet(){
        if(isset($_POST) && !empty($_POST) && array_key_exists('search', $_POST)){
            return true;
        }
        return false;
    }

    public function getSearch(){
        if($this->isSearchSet()){
            return $_POST['search'];
        }
    }
}
?>