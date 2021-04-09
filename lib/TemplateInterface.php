<?php
interface TemplateInterface{
    public function drawTemplate();
    public function includeTemplateByAction($action);
    public function setAction($action);
    public function getAction();
    public function setElementId($element_id);
    public function getElementId();
    public function setSearch_item($search_item);
    public function getSearch_item();
    public function setClient($client);
    public function getClient();
    public function setSearch($search);
    public function getSearch();
    public function setLogin($login);
    public function getLogin();
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
}
?>