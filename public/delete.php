<?php
include_once('../includes/content.php');
if(isset($_SESSION['username'])){
if($_SESSION['username'] =="admin"){
if(isset($_GET['id'])){
$id = $_GET['id'];
$content->content_delete($tablename, $taplename,$id);
header("location: edit_page.php?msg=Item Deleted");
}
}
}else{
header("location: edit_page.php");
}
?>
