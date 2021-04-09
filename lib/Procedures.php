<?php
class Procedures{
    private $id;
    private $author;
    private $subject;
    private $date;
    private $path;
    private $tag;
    private $arch;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setAuthor($author){
        $this->author = $author;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function setSubject($subject){
        $this->subject = $subject;
    }

    public function getSubject(){
        return $this->subject;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function getDate(){
        return $this->date;
    }

    public function setPath($path){
        $this->path = $path;
    }

    public function getPath(){
        return $this->path;
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