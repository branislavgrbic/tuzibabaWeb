<?php

if(isset($_POST['upload'])) {

$allowed_filetypes = array('.jpg','.jpeg','.png','.gif');
$max_filesize = 10485760;
$upload_path = 'images/';
$description = $_POST['imgdesc'];

$filename = $_FILES['userfile']['name'];
$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);

if(!in_array($ext,$allowed_filetypes))
  die('The file you attempted to upload is not allowed.');

if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
  die('The file you attempted to upload is too large.');

if(!is_writable($upload_path))
  die('You cannot upload to the specified directory, please CHMOD it to 777.');

if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename)) {
   $query = "INSERT INTO uploads (name, description) VALUES ($filename, $description)"; 
   mysql_query($query);

echo 'Your file upload was successful!';


} else {
     echo 'There was an error during the file upload.  Please try again.';
}
}
?>