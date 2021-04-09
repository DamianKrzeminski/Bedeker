<?php
interface SessionInterface{
    public function setLoginSession($login);
    public function getLoginSession();
    public function logout();
}
?>