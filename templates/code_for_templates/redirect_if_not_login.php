<?php
if($this->getLogin() === null || empty($this->getLogin())){
    header('Location:?');
}
?>