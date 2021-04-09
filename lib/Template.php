<?php
class Template implements TemplateInterface{

    private $action;
    private $element_id;
    private $search_item;
    private $client;
    private $search;
    private $login;
    private $main_object_model;
    private $comment_model;
    private $client_model;
    private $tag_model;
    private $search_model;

    public function drawTemplate(){
        $this->includeTemplateByAction($this->action);
    }

    public function includeTemplateByAction($action){
        switch($action){
            case '':
                include_once('templates/base/login.phtml');
                break;
            case 'home':
                include_once('templates/base/home.phtml');
            break;
            case 'routers':
                include_once('templates/lists/main_templates/routers.phtml');
            break;
            case 'add_routers':
            case 'edit_routers':
                include_once('templates/add_edit/main_templates/add_edit_router.phtml');
            break;
            case 'servers':
                include_once('templates/lists/main_templates/servers.phtml');
            break;
            case 'add_servers':
            case 'edit_servers':
                include_once('templates/add_edit/main_templates/add_edit_server.phtml');
            break;
            case 'contact_details':
                include_once('templates/lists/main_templates/contact_details.phtml');
            break;
            case 'add_contact_details':
            case 'edit_contact_details':
                include_once('templates/add_edit/main_templates/add_edit_contact_detail.phtml');
            break;
            case 'clients':
                include_once('templates/lists/main_templates/clients.phtml');
            break;
            case 'add_clients':
            case 'edit_clients':
                include_once('templates/add_edit/main_templates/add_edit_client.phtml');
            break;
            case 'procedures':
                include_once('templates/lists/main_templates/procedures.phtml');
            break;
            case 'add_procedures':
                include_once('templates/add_edit/main_templates/add_edit_procedure.phtml');
            break;
            case 'tags':
                include_once('templates/lists/main_templates/tags.phtml');
            break;
            case 'add_tags':
            case 'edit_tags':
                include_once('templates/add_edit/main_templates/add_edit_tag.phtml');
            break;
            case 'users':
                include_once('templates/lists/main_templates/users.phtml');
            break;
            case 'add_users':
            case 'edit_users':
                include_once('templates/add_edit/main_templates/add_edit_user.phtml');
            break;
            case 'search':
                include_once('templates/search/search.phtml');
                break;
            default:
                include_once('templates/base/error404.phtml');
            break;
        }
    }

    public function setAction($action){
        $this->action = $action;
        return $this;
    }

    public function getAction(){
        return $this->action;
    }

    public function setElementId($element_id){
        $this->element_id = $element_id;
        return $this;
    }

    public function getElementId(){
        return $this->element_id;
    }

    public function setSearch_item($search_item){
        $this->search_item = $search_item;
        return $this;
    }
    
    public function getSearch_item(){
        return $this->search_item;
    }

    public function setClient($client){
        $this->client = $client;
        return $this;
    }
    
    public function getClient(){
        return $this->client;
    }

    public function setSearch($search){
        $this->search = $search;
        return $this;
    }
    
    public function getSearch(){
        return $this->search;
    }

    public function setLogin($login){
        $this->login = $login;
        return $this;
    }
    
    public function getLogin(){
        return $this->login;
    }

    public function setMainObjectModel($main_object_model){
        $this->main_object_model = $main_object_model;
        return $this;
    }

    public function getMainObjectModel(){
        if(!isset($this->main_object_model)){
            return false;
        }
        return $this->main_object_model;
    }

    public function setCommentModel($comment_model){
        $this->comment_model = $comment_model;
        return $this;
    }

    public function getCommentModel(){
        if(!isset($this->comment_model)){
            return false;
        }
        return $this->comment_model;
    }

    public function setClientModel($client_model){
        $this->client_model = $client_model;
        return $this;
    }

    public function getClientModel(){
        if(!isset($this->client_model)){
            return false;
        }
        return $this->client_model;
    }

    public function setTagModel($tag_model){
        $this->tag_model = $tag_model;
        return $this;
    }

    public function getTagModel(){
        if(!isset($this->tag_model)){
            return false;
        }
        return $this->tag_model;
    }

    public function setSearchModel($search_model){
        $this->search_model = $search_model;
        return $this;
    }

    public function getSearchModel(){
        if(!isset($this->search_model)){
            return false;
        }
        return $this->search_model;
    }
}
?>