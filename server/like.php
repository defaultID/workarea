<?php
include_once 'db.php';
if(isset($_POST['id']) && isset($_POST['rel'])) {
    $id=mysqli_real_escape_string($link, $_POST['id']);
    $rel=mysqli_real_escape_string($link,$_POST['rel']);
    if($rel=='Like') {
//---Нравится----
        mysqli_query($link,"UPDATE  `anecdotes_table` SET  `like` = `like`+1 WHERE  `anecdotes_table`.`id` = '$id'");
        $like=mysqli_query($link,"SELECT  `like` FROM  `anecdotes_table` WHERE  `id` = '$id'");
        $like=mysqli_fetch_array($like);
        echo $like['like'];
    } else {
//---Не нравится----
        mysqli_query($link,"UPDATE  `anecdotes_table` SET  `like` = `like`-1 WHERE  `anecdotes_table`.`id` = '$id'");
        $like=mysqli_query($link,"SELECT  `like` FROM  `anecdotes_table` WHERE  `id` = '$id'");
        $like=mysqli_fetch_array($like);
        echo $like['like'];
    }
}