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

$family_name = $_POST['family_name'];
$last_name = $_POST['last_name'];
$family_name_kana = $_POST['family_name_kana'];
$last_name_kana = $_POST['last_name_kana'];
$mail = $_POST['mail'];
$auth = $_GET['auth'];

if($_POST['gender'] == "男"){
    $gender = 0;
}else{
    $gender = 1;
}
        
if($_POST['authority'] == "一般"){
    $authority = 0;
}else{
    $authority = 1;
}

header('Location:list.php?family_name='.$family_name.'&last_name='.$last_name.'&family_name_kana='.$family_name_kana.'&last_name_kana='.$last_name_kana.'&mail='.$mail.'&gender='.$gender.'&authority='.$authority.'&auth='.$auth);

?>