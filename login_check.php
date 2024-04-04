<?php

error_reporting(E_ALL);
ini_set('display_errors',0);

$dsn='mysql:dbname=lesson1; host=localhost';
$user='root';
$password='';

try{
    $dbh= new PDO($dsn,$user,$password);
        
    if($dbh == null){
        print('接続に失敗しました。<br>');
    }else{
        print('');
    }
}catch(Exception $e){
    print"<font color='red'>エラーが発生したためログインできません。</font>";
}

register_shutdown_function(function(){
    $error = error_get_last();
    if($error !== null && $error['type'] === E_ERROR){
        print"<font color='red'>エラーが発生したためログインできません。</font>";
        $error['message'];
    }
});

function customErrorHandler($errno,$errstr){
    switch($errno){
        case E_WARNING:
            die("<font color='red'>エラーが発生したためログインできません。</font>");
            break;
            
        case E_NOTICE:
            die("<font color='red'>エラーが発生したためログインできません。</font>");
            break;
    }
}

set_error_handler("customErrorHandler");

mb_internal_encoding("utf8");

$pdo=new PDO("mysql:dbname=lesson1; host=localhost;","root","");

$stmt = $pdo->prepare("SELECT * FROM registration WHERE mail = ?");

$password = $_POST['password'];
$mail = $_POST['mail'];
    
$stmt->execute([$mail]);

if($stmt->rowcount() > 0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(password_verify($password,$row['password'])){
        $auth = $row['authority'];
        header('Location:diblog.php?auth='.urlencode($auth));
        
        exit();
    }else{
        $error = "ログインに失敗しました";
        header('Location:login.php?error='.urlencode($error));
        exit();
    }
}else{
    $error = "ユーザーが見つかりませんでした";
    header('Location:login.php?error='.urlencode($error));
    exit();
}


?>