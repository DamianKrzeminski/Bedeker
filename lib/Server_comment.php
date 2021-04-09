<?php
class Server_comment{
    private $id;
    private $servers_id;
    private $author;
    private $date;
    private $content;
    private $arch;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setServers_id($servers_id){
        $this->servers_id = $servers_id;
    }

    public function getServers_id(){
        return $this->servers_id;
    }

    public function setAuthor($author){
        $this->author = $author;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function getDate(){
        return $this->date;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function getContent(){
        return $this->content;
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