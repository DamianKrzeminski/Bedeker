<?php
interface ObjectModelInterface{
    public function checkLoginPassword($post);
    public function getAll($table);
    public function getByCondition($table, $column, $condition);
    public function getItemColumns($item);
    public function getBySearch($table, $search);
    public function moveToInUse($table, $id);
    public function moveToArch($table, $id);
    public function delete($table, $id);
    public function deleteByCondition($table, $column, $condition);
    public function deleteFile($subject);
    public function preparePost($post);
    public function saveFileContent($post);
    public function getNamesToShow($name);
}
?>