<?php
class Contact_detail_comment{
    private $id;
    private $contact_details_id;
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

    public function setContact_details_id($contact_details_id){
        $this->contact_details_id = $contact_details_id;
    }

    public function getContact_details_id(){
        return $this->contact_details_id;
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