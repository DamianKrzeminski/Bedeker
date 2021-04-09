<?php
$comment_model = $this->getCommentModel();
$table = $this->getAction() . "_comment";
$all_comments = $comment_model->getAll($table);
$arch_comments = [];
$in_use_comments = [];
foreach($all_comments as $i => $comment){
    if($comment['arch'] == '1'){
        $arch_comments[] = $all_comments[$i];
    }elseif($comment['arch'] == '0'){
        $in_use_comments[] = $all_comments[$i];
    }
}
?>