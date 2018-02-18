<?php
/*
sleep(4);

file_put_contents('.htaccess','
php_value post_max_size 2000M
php_value upload_max_filesize 2500M
php_value max_execution_time 6000000
php_value max_input_time 6000000
php_value memory_limit 2500M
');
*/
$exArr=array('mp3','jpg','jpeg','png','mp4',"html");
$typeArr=array('audio/mp3','image/jpeg','image/jpg','image/png','video/mp4','text/html');

fileUpload($_FILES['file'],$exArr,$typeArr,'',1,10000000,false);
function fileUpload($file,$exArr,$typeArr,$dir
,$minSize=1,$maxSize=1024,$nameChange=true)
{
	if(!is_array($file) || $file==NULL 
	||!is_array($exArr) || $exArr==NULL 
	||!is_array($typeArr) || $typeArr==NULL ) die("Invalid Entries");
	
	if($file['error']>0) die("Error while Uploading File");
	if($file['size']/1024<$minSize || $file['size']/1024>$maxSize) die("Error In limmited size");
	//if($dir==NULL) die("Directory is not Valid");
	$name=$file['name'];
	$name=strtolower($name);
	$ex1=explode(".",$name);
	$ex1=array_pop($ex1);
	//if(!in_array($ex1,$exArr)) die("Your Extension is not valid");
	//if(!in_array($file['type'],$typeArr)) die("Your File is not valid type");
	
	if($nameChange==true)
	{
		$name=sha1(str_shuffle($name.time()));
		//$name.=time();
		//$name=str_shuffle($name);
		//$name=sha1($name);
	}
	if($nameChange==false)
	{
		$name=$name;
	}
	if(move_uploaded_file($file['tmp_name'],$name))
	{
		echo "Upload Successfull";
	}
	else
	{
		echo "Upload Failed";
	}
}

 
 /*
 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	*/
?>