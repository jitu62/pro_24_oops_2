<?php

if(($_FILES['file']['size']<=2000000) &&
(($_FILES['file']['type'] == "image/jpeg") ||
($_FILES['file']['type'] == "image/png") ||
($_FILES['file']['type'] == "image/gif"))){
$imagepath = "../upload/";
$imagename = time() ."-" . rand() ."-". $_FILES['file']['name'];
$cpath = $imagepath . $imagename;
if(file_exists($cpath)){
echo "File already present";
}else{
move_uploaded_file($_FILES['file']['tmp_name'], $cpath);
}
}else{
echo "Invalid file";
}
?>