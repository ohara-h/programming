<?php

mb_internal_encoding("utf8");

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
    print"<font color='red'>エラーが発生したためアカウント削除できません。</font>";
}

register_shutdown_function(function(){
    $error = error_get_last();
    if($error !== null && $error['type'] === E_ERROR){
        print"<font color='red'>エラーが発生したためアカウント削除できません。</font>";
        $error['message'];
    }
});

function customErrorHandler($errno,$errstr){
    switch($errno){
        case E_WARNING:
            die("<font color='red'>エラーが発生したためアカウント削除できません。</font>");
            break;
            
        case E_NOTICE:
            die("<font color='red'>エラーが発生したためアカウント削除できません。</font>");
            break;
    }
}

set_error_handler("customErrorHandler");

$pdo=new PDO("mysql:dbname=lesson1; host=localhost;","root","");

$auth = $_GET['auth'];
 
if($auth == 1){
    $regist = "<a href = 'regist.php?auth=".$auth."'>アカウント登録</a>";
    $list = "<a href = 'list.php?auth=".$auth."'>アカウント一覧</a>";
}else{
    $regist = "アカウント登録";
    $list = "アカウント一覧";
}

$top = "<a href = 'diblog.php?auth=".$auth."'>トップ</a>";
$delete = "delete.php?auth=".$auth;
$delete_com = "delete_complete.php?auth=".$auth;

$accountid = $_POST['number'];
 
$stmt = $pdo->prepare("SELECT * FROM registration WHERE id = ?");

$stmt->execute([$accountid]);
?>

<!doctype HTML>

<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント削除確認画面</title>
        <link rel="stylesheet" type="text/css" href="delete_confirm.css">
    </head>
    
    <body>
        <header>
            <div class="box1">
                <ul class="ul1">
                    <li class="li1"><?php echo $top; ?></li>
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
        
        <div id="title">アカウント登録完了画面</div>
        <p id="authmsg"></p>
        <h1>本当に削除してよろしいですか？</h1>
        
        <form  method="post" action="<?php echo $delete; ?>">
            <input type="submit"  onClick=history.back() class="submit" value="前に戻る">
            <input type="hidden" name="number" value="<?php echo $accountid; ?>">
        </form>
        
        <form method="post" action="<?php echo $delete_com; ?>">
            <input type="submit"  class="submit2" value="削除する">
            <input type="hidden" name="number" value="<?php echo $accountid; ?>">
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