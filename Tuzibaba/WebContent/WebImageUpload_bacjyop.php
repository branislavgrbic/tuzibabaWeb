<?php
	$con = $con = mysql_connect("178.148.111.25","root","");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("testdb",$con);

	$name = $_REQUEST['Kategorija'];
	$surname = $_REQUEST['Opis'];
	switch ($name) {
		case "Ostalo":
			$name = 0;
			break;
		case "Rupa na putu":
			$name = 1;
			break;
		case "Smeće":
			$name = 2;
			break;
		case "Grafiti":
			$name = 3;
			break;
		case "Ulična rasveta":
			$name = 4;
			break;
		case "Nepropisno parkiranje":
			$name = 5;
			break;
		case "Zapušeni slivnici":
			$name = 6;
			break;
		default:
			$name = 0;
	}
	mysql_query("INSERT INTO names (first,last)
	VALUES ('$name','$surname')",$con );
	$id = mysql_insert_id();

if(isset($_POST['upload'])) {

$allowed_filetypes = array('.jpg','.jpeg','.png','.gif');
$max_filesize = 10485760;
$upload_path = 'images/';

$filename = $_FILES['userfile']['name'];

$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);

$filepath =('uploaded_image') . ($id) . ($ext) ;
if(!in_array($ext,$allowed_filetypes))
  die('The file you attempted to upload is not allowed.');

if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
  die('The file you attempted to upload is too large.');

if(!is_writable($upload_path))
  die('You cannot upload to the specified directory, please CHMOD it to 777.');

if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filepath)) {
  

echo 'Your file upload was successful!';


} else {
     echo 'There was an error during the file upload.  Please try again.';
}
}
	
    mysql_query("UPDATE names SET imageName= '$filepath' 
								WHERE ID = '$id'") or die ('Errant query:');
	

?>