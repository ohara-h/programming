<?php

session_start();
$auth = $_SESSION['auth'];

if(!isset($auth)){
    header("Location:login.php");
}

error_reporting(E_ALL);
ini_set('display_errors',0);

$dsn='mysql:dbname=lesson1; host=localhost';
$user='root';
$password='';

$date=date('y-m-d');

try{
    $dbh= new PDO($dsn,$user,$password);
        
    if($dbh == null){
        print('接続に失敗しました。<br>');
    }else{
        print('');
    }
}catch(Exception $e){
    print"<font color='red'>エラーが発生したためアカウント更新できません<br>メールアドレスがすでに登録されている場合は登録できません。</font>";
}

register_shutdown_function(function(){
    $error = error_get_last();
    if($error !== null && $error['type'] === E_ERROR){
        print"<font color='red'>エラーが発生したためアカウント更新できません<br>メールアドレスがすでに登録されている場合は登録できません。</font>";
        $error['message'];
    }
});

function customErrorHandler($errno,$errstr){
    switch($errno){
        case E_WARNING:
            die("<font color='red'>エラーが発生したためアカウント更新できません<br>メールアドレスがすでに登録されている場合は登録できません。</font>");
            break;
            
        case E_NOTICE:
            die("<font color='red'>エラーが発生したためアカウント更新できません<br>メールアドレスがすでに登録されている場合は登録できません。</font>");
            break;
    }
}

set_error_handler("customErrorHandler");

mb_internal_encoding("utf8");

$pdo=new PDO("mysql:dbname=lesson1; host=localhost;","root","");

if($auth == 1){
    $regist = "<a href = 'regist.php'>アカウント登録</a>";
    $list = "<a href = 'list.php'>アカウント一覧</a>";
}else{
    $regist = "アカウント登録";
    $list = "アカウント一覧";
}

$top="diblog.php";
$top2 = "<a href = 'diblog.php'>トップ</a>";
$accountid = $_POST['number'];

if($_POST['password'] == ""){
    $stmt = $pdo->prepare("UPDATE registration SET family_name='".$_POST['family_name']."',last_name='".$_POST['last_name']."',family_name_kana='".$_POST['family_name_kana']."',last_name_kana='".$_POST['last_name_kana']."',mail='".$_POST['mail']."',gender='".$_POST['gender']."',postal_code='".$_POST['postal_code']."',prefecture='".$_POST['prefecture']."',address_1='".$_POST['address_1']."',address_2='".$_POST['address_2']."',authority='".$_POST['authority']."',update_time='$date' WHERE id = ?"); 

    $stmt->execute([$accountid]);
    
}else{
    $stmt = $pdo->prepare("UPDATE registration SET family_name='".$_POST['family_name']."',last_name='".$_POST['last_name']."',family_name_kana='".$_POST['family_name_kana']."',last_name_kana='".$_POST['last_name_kana']."',mail='".$_POST['mail']."',password='".password_hash($_POST['password'],PASSWORD_DEFAULT)."',gender='".$_POST['gender']."',postal_code='".$_POST['postal_code']."',prefecture='".$_POST['prefecture']."',address_1='".$_POST['address_1']."',address_2='".$_POST['address_2']."',authority='".$_POST['authority']."',update_time='$date' WHERE id = ?"); 

    $stmt->execute([$accountid]);
}

?>

<!doctype HTML>

<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント更新完了画面</title>
        <link rel="stylesheet" type="text/css" href="update_complete.css">
    </head>
    
    <body>
        <header>
            <div class="box1">
                <ul class="ul1">
                    <li class="li1"><?php echo $top2; ?></li>
                    <li class="li3">プロフィール</li>
                    <li class="li3">D.I.Blogについて</li>
                    <li class="li3">登録フォーム</li>
                    <li class="li3">問い合わせ</li>
                    <li class="li3"><?php echo $regist; ?></li>
                    <li class="li3"><?php echo $list; ?></li>
                    <li class="li2">その他</li>
                </ul>
            </div>
        </header>
        <p id="authmsg"></p>
        <div id="title">アカウント更新完了画面</div>
        <h1>更新完了しました</h1>
        
        <form method="post" action="<?php echo $top; ?>">
            <input type="submit"  class="submit" value="TOPページへ戻る">
        </form>
        
        <footer>
            <div class="box3">Copyright D.I.works| D.I.blog is the one which provides A to Z about programming</div>
        </footer>
        <script>
            var auth = <?php echo $auth; ?>;
                if(auth == 0){
                    let authmsg = document.getElementById("authmsg");
                    authmsg.innerHTML = "権限が一般のため、操作できません";
                    authmsg.style.color="red";
                    authmsg.style.marginLeft="150px";
                    let elements = document.querySelectorAll('a,input,button,textarea,select');
                    Array.from(elements).forEach(function(element){
                        if(element.tagName.toLowerCase() !== 'a') {
                            element.disabled = true;
                            element.style.pointerEvents = 'none';
                        }
                    });
                }
        </script>
    </body>
</html>