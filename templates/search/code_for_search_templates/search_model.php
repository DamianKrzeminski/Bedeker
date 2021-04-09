<?php
$search_model = $this->getSearchModel();
$columns = $search_model->getItemColumns($this->getSearch_item());
unset($columns['snmp_password']);
unset($columns['password']);
unset($columns['contact_detail_id']);
unset($columns['router_id']);
unset($columns['server_id']);
unset($columns['id']);
unset($columns['path']);
$columns = array_keys($columns);
$columns_to_show = array();
foreach($columns as $column){
    $column_to_show = $search_model->getNamesToShow($column);
    $columns_to_show[$column] = $column_to_show;
}
?>