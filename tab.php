<?php
error_reporting(E_ALL^E_NOTICE^E_DEPRECATED^E_STRICT);
// var_dump($_POST);
$pdo=new PDO("mysql:host=localhost;dbname=web13",'root',"");
$pdo->query("set names utf8");
switch ($_POST['index']){
    case 0:
        $tablename="admin"; break;
    case 1:
        $tablename="member"; break;
    case 2:
        $tablename="news"; break;
}
$sql="select * from ".$tablename." order by id desc limit 3";
$result=$pdo->query($sql);
$data=$result->fetchAll(PDO::FETCH_OBJ);
// var_dump($data); 
// 把对象组成的数组$data 编码为json格式
echo json_encode($data);

;?>