<?php
interface ApplicationInterface {
    public function start();
    public function handlePost();
    public function handleGet();
    public function setRequest($request);
    public function getRequest();
    public function setTemplate($template);
    public function getTemplate();
    public function setSession($session);
    public function getSession();
    public function setMainObjectModel($main_object_model);
    public function getMainObjectModel();
    public function setCommentModel($comment_model);
    public function getCommentModel();
    public function setClientModel($client_model);
    public function getClientModel();
    public function setTagModel($tag_model);
    public function getTagModel();
    public function setSearchModel($search_model);
    public function getSearchModel();
    public function setProfileModel($profile_model);
    public function getProfileModel();
    public function setSessionModel($session_model);
    public function getSessionModel();
}