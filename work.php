<?php


$file_path='/var/www/www-root/data/www/ironlinks.ru/nordic/sofia/nordic6/timon/data.txt';

$data = file_get_contents($file_path);

if($data == null){
	$arr = [];
}else{
	$arr = json_decode($data);
}
 
$new_data=$_POST;
//вермя публикации
$new_data['publ_time']=time();



$arr[] = $new_data;


$json = json_encode($arr);
file_put_contents($file_path,$json);  
header('Location: index.php#textbox'); 

?>