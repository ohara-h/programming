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
    print"<font color='red'>エラーが発生したためアカウント情報を取得できません。</font>";
}

register_shutdown_function(function(){
    $error = error_get_last();
    if($error !== null && $error['type'] === E_ERROR){
        print"<font color='red'>エラーが発生したためアカウント情報を取得できません。</font>";
        $error['message'];
    }
});

function customErrorHandler($errno,$errstr){
    switch($errno){
        case E_WARNING:
            die("<font color='red'>エラーが発生したためアカウント情報を取得できません。</font>");
            break;
            
        case E_NOTICE:
            die("<font color='red'>エラーが発生したためアカウント情報を取得できません。</font>");
            break;
    }
}

set_error_handler("customErrorHandler");

$family_name = "all_search";


header('Location:list.php?family_name='.$family_name);

?>