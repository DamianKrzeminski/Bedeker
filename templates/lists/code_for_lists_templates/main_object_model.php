<?php
$search = false;
$main_object_model = $this->getMainObjectModel();
if($this->getSearch() !== null && !empty($this->getSearch())){
$all_objects = $main_object_model->getBySearch($this->getAction(), $this->getSearch());
$search = true;
}else if($this->getClient() !== null && !empty($this->getClient())){
    $all_objects = $main_object_model->getByCondition($this->getAction(), 'client', $this->getClient());
}else{
    $all_objects = $main_object_model->getAll($this->getAction());
}
$arch_objects = [];
$in_use_objects = [];
foreach($all_objects as $i => &$object){
    foreach($object as $varName => &$varValue){
        if(strpos($varValue, ';') !== false){
            $varValue = substr($varValue, 1, strlen($varValue)-2);
            $varValue = explode(';', $varValue);
            foreach($varValue as $id => $value){
                if(empty($value)){
                    $varValue["$id"] = '-';
                }
            }
        }
    }
    if(array_key_exists('arch', $object)){
        if($object['arch'] == '1'){
            $arch_objects[] = $all_objects[$i];
        }elseif($object['arch'] == '0'){
            $in_use_objects[] = $all_objects[$i];
        }
    }
}
if(count($in_use_objects) == 0 && count($arch_objects) == 0){
    $in_use_objects = $all_objects;
}
$action_name_to_display = $main_object_model->getNamesToShow($this->getAction());
?>