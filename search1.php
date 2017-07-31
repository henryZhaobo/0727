<?php
error_reporting(E_ALL^E_NOTICE^E_STRICT^E_DEPRECATED);

if($_POST['action']=="getResult"){
    $sql="select * from member where username='".$_POST['keyword']."' order by id desc limit 8";
   querySql($sql);
}
if($_POST["action"]=="search"){
	$sql="select * from member where username like '%".$_POST['keyword']."%' order by id desc limit 8";
	querySql($sql);
}
function querySql($sql){
    try{
        $pdo=new PDO("mysql:host=localhost;dbname=web13","root","");
    }catch (PDOException $e){
        exit($e->getMessage());
    }
    $pdo->query("set names utf8");
    //echo $sql;
    $result=$pdo->query($sql);
    $data=$result->fetchAll(PDO::FETCH_OBJ);
    if($data[0]){
        echo json_encode($data);
    }else {
        echo "failed";
    } 
}

//var_dump($_POST); 


/* error_reporting(E_ALL^E_NOTICE^E_STRICT^E_DEPRECATED);

//搜索结果
if($_POST['action']=="getResult"){
    $sql="select * from member where username='".$_POST['keyword']."' order by id desc limit 1";
    querySql($sql);
}
//搜索提示
if ($_POST['action']=="search"){
    $sql="select * from member where username like '%".$_POST['keyword']."%' order by id desc limit 7";
    querySql($sql);
}
function querySql($sql){
    try{
        $pdo=new PDO("mysql:host=localhost;dbname=web13","root","");
    }catch(PDOException $e){
        exit($e->getMessage());
    }
    $pdo->query("set names utf8");
    $result=$pdo->query($sql);
    $data=$result->fetchAll(PDO::FETCH_OBJ);
    if($data[0]){
        echo json_encode($data);
    }else{
        echo "failed";
    }
} */
?> 