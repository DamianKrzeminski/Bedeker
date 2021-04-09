<?php
class Application implements ApplicationInterface{

    private $request;
    private $template;
    private $session;
    private $main_object_model;
    private $comment_model;
    private $client_model;
    private $tag_model;
    private $search_model;
    private $profile_model;
    private $session_model;

    public function __construct(){
        session_start();
        $this->setRequest(new Request());
        $this->setTemplate(new Template());
        $this->setSession(new Session());
        $this->setMainObjectModel(new ObjectModel());
        $this->setCommentModel(new ObjectModel());
        $this->setClientModel(new ObjectModel());
        $this->setTagModel(new ObjectModel());
        $this->setProfileModel(new ObjectModel());
        $this->setSearchModel(new ObjectModel());
        $this->setSessionModel(new ObjectModel());
    }

    public function start(){
        $this->handlePost();
        $this->handleGet();
    }

    public function handlePost(){
        if($this->request->isPostSet() && $this->request->isSearchSet() == false && $this->request->getAction() != 'login'){
            if($this->request->getPost()['table'] == 'procedures'){
                $this->main_object_model->saveFileContent($this->request->getPost());
            }else{
                $this->main_object_model->preparePost($this->request->getPost());
            }
        }
    }

    public function handleGet(){
        switch($this->request->getAction()){
            case 'login':
                $validity = $this->session_model->checkLoginPassword($this->request->getPost());
                if($validity){
                    $this->session->setLoginSession($this->request->getPost()['login']);
                    header('Location:?action=home');
                }else{
                    header('Location:?');
                }
                break;
            case 'logout':
                $this->session->logout();
                header('Location:?');
                break;
            case 'profile':
                $user = $this->profile_model->getByCondition('users', 'login', $this->session->getLoginSession());
                header('Location:?action=edit_users&id=' . $user[0]['id']);
                break;     
            case 'delete_routers':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->deleteByCondition('routers', 'id', $this->request->getId());
                    $this->main_object_model->deleteByCondition('routers_comment', 'routers_id', $this->request->getId());
                    header('Location:?action=routers');
                }
            break;
            case 'arch_routers':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToArch('routers', $this->request->getId());
                    header('Location:?action=routers');
                }
            break;
            case 'restore_routers':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToInUse('routers', $this->request->getId());
                    header('Location:?action=routers');
                }
            break;
            case 'delete_routers_comment':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->deleteByCondition('routers_comment', 'id', $this->request->getId());
                    header('Location:?action=routers');
                }
            break;
            case 'arch_routers_comment':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToArch('routers_comment', $this->request->getId());
                    header('Location:?action=routers');
                }
            break;
            case 'restore_routers_comment':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToInUse('routers_comment', $this->request->getId());
                    header('Location:?action=routers');
                }
            break;
            case 'delete_servers':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->deleteByCondition('servers', 'id', $this->request->getId());
                    $this->main_object_model->deleteByCondition('servers_comment', 'servers_id', $this->request->getId());
                    header('Location:?action=servers');
                }
            break;
            case 'arch_servers':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToArch('servers', $this->request->getId());
                    header('Location:?action=servers');
                }
            break;
            case 'restore_servers':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToInUse('servers', $this->request->getId());
                    header('Location:?action=servers');
                }
            break;
            case 'delete_servers_comment':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->deleteByCondition('servers_comment', 'id', $this->request->getId());
                    header('Location:?action=servers');
                }
            break;
            case 'arch_servers_comment':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToArch('servers_comment', $this->request->getId());
                    header('Location:?action=servers');
                }
            break;
            case 'restore_servers_comment':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToInUse('servers_comment', $this->request->getId());
                    header('Location:?action=servers');
                }
            break;
            case 'delete_contact_details':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->deleteByCondition('contact_details', 'id', $this->request->getId());
                    $this->main_object_model->deleteByCondition('contact_details_comment', 'contact_details_id', $this->request->getId());
                    header('Location:?action=contact_details');
                }
            break;
            case 'arch_contact_details':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToArch('contact_details', $this->request->getId());
                    header('Location:?action=contact_details');
                }
            break;
            case 'restore_contact_details':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToInUse('contact_details', $this->request->getId());
                    header('Location:?action=contact_details');
                }
            break;
            case 'delete_contact_details_comment':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->deleteByCondition('contact_details_comment', 'id', $this->request->getId());
                    header('Location:?action=contact_details');
                }
            break;
            case 'arch_contact_details_comment':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToArch('contact_details_comment', $this->request->getId());
                    header('Location:?action=contact_details');
                }
            break;
            case 'restore_contact_details_comment':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToInUse('contact_details_comment', $this->request->getId());
                    header('Location:?action=contact_details');
                }
            break;
            case 'delete_clients':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->deleteByCondition('clients', 'id', $this->request->getId());
                    header('Location:?action=clients');
                }
            break;
            case 'arch_clients':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToArch('clients', $this->request->getId());
                    header('Location:?action=clients');
                }
            break;
            case 'restore_clients':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToInUse('clients', $this->request->getId());
                    header('Location:?action=clients');
                }
            break;
            case 'delete_tags':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->deleteByCondition('tags', 'id', $this->request->getId());
                    header('Location:?action=tags');
                }
            break;
            case 'arch_tags':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToArch('tags', $this->request->getId());
                    header('Location:?action=tags');
                }
            break;
            case 'restore_tags':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToInUse('tags', $this->request->getId());
                    header('Location:?action=tags');
                }
            break;
            case 'delete_users':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->deleteByCondition('users', 'id', $this->request->getId());
                    header('Location:?action=users');
                }
            break;
            case 'delete_procedures':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->deleteFile($this->request->getSubject());
                    $this->main_object_model->deleteByCondition('procedures', 'id', $this->request->getId());
                    header('Location:?action=procedures');
                }
            break;
            case 'arch_procedures':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToArch('procedures', $this->request->getId());
                    header('Location:?action=procedures');
                }
            break;
            case 'restore_procedures':
                if($this->session->getLoginSession() === null || empty($this->session->getLoginSession())){
                    header('Location:?');
                }else{
                    $this->main_object_model->moveToInUse('procedures', $this->request->getId());
                    header('Location:?action=procedures');
                }
            break;
            default:
                $this->template->setMainObjectModel($this->main_object_model);
                $this->template->setCommentModel($this->comment_model);
                $this->template->setClientModel($this->client_model);
                $this->template->setTagModel($this->tag_model);
                $this->template->setSearchModel($this->search_model);
                $this->template->setLogin($this->session->getLoginSession());
                $this->template->setAction($this->request->getAction());
                $this->template->setElementId($this->request->getId());
                $this->template->setSearch_item($this->request->getSearch_item());
                $this->template->setSearch($this->request->getSearch());
                $this->template->setClient($this->request->getClient());
                $this->template->drawTemplate();
            break;
        }
    }

    public function setRequest($request){
        if(!isset($this->request)){
            $this->request = $request;
        }
        return $this;
    }
    public function getRequest(){
        return $this->request;
    }

    public function setTemplate($template){
        if(!isset($this->template)){
            $this->template = $template;
        }
        return $this;
    }

    public function getTemplate(){
        return $this->template;
    }

    public function setSession($session){
        if(!isset($this->session)){
            $this->session = $session;
        }
        return $this;
    }

    public function getSession(){
        return $this->session;
    }

    public function setMainObjectModel($main_object_model){
        if(!isset($this->main_object_model)){
            $this->main_object_model = $main_object_model;
        }
        return $this;
    }

    public function getMainObjectModel(){
        return $this->main_object_model;
    }

    public function setCommentModel($comment_model){
        if(!isset($this->comment_model)){
            $this->comment_model = $comment_model;
        }
        return $this;
    }

    public function getCommentModel(){
        return $this->comment_model;
    }

    public function setClientModel($client_model){
        if(!isset($this->client_model)){
            $this->client_model = $client_model;
        }
        return $this;
    }

    public function getClientModel(){
        return $this->client_model;
    }

    public function setTagModel($tag_model){
        if(!isset($this->tag_model)){
            $this->tag_model = $tag_model;
        }
        return $this;
    }

    public function getTagModel(){
        return $this->tag_model;
    }

    public function setSearchModel($search_model){
        if(!isset($this->search_model)){
            $this->search_model = $search_model;
        }
        return $this;
    }

    public function getSearchModel(){
        return $this->search_model;
    }

    public function setProfileModel($profile_model){
        if(!isset($this->profile_model)){
            $this->profile_model = $profile_model;
        }
        return $this;
    }

    public function getProfileModel(){
        return $this->profile_model;
    }

    public function setSessionModel($session_model){
        if(!isset($this->session_model)){
            $this->session_model = $session_model;
        }
        return $this;
    }

    public function getSessionModel(){
        return $this->session_model;
    }
}
?>