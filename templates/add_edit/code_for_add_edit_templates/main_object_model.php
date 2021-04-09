<?php
if($this->getElementId() !== null && !empty($this->getElementId())){
    $main_object_model = $this->getMainObjectModel();
    $objects = $main_object_model->getByCondition(substr($this->getAction(), strpos($this->getAction(), '_') + 1, strlen($this->getAction())), 'id', $this->getElementId());
    $object = $objects[0];
    foreach($object as $varName => &$varValue){
        if(strpos($varValue, ';') !== false){
            $varValue = substr($varValue, 1, strlen($varValue)-2);
        }
    }
}else{   
    $object = false;
}
?>