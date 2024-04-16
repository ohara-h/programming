<?php

mb_internal_encoding("utf8");

$pdo=new PDO("mysql:dbname=lesson1; host=localhost;","root","");

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
    print"<font color='red'>エラーが発生したためアカウント更新できません。</font>";
}

register_shutdown_function(function(){
    $error = error_get_last();
    if($error !== null && $error['type'] === E_ERROR){
        print"<font color='red'>エラーが発生したためアカウント更新できません。</font>";
        $error['message'];
    }
});

function customErrorHandler($errno,$errstr){
    switch($errno){
        case E_WARNING:
            die("<font color='red'>エラーが発生したためアカウント更新できません。</font>");
            break;
            
        case E_NOTICE:
            die("<font color='red'>エラーが発生したためアカウント更新できません。</font>");
            break;
    }
}

set_error_handler("customErrorHandler");

session_start();
$auth = $_SESSION['auth'];

if(!isset($auth)){
    header("Location:login.php");
}
 
if($auth == 1){
    $regist = "<a href = 'regist.php'>アカウント登録</a>";
    $list = "<a href = 'list.php'>アカウント一覧</a>";
}else{
    $regist = "アカウント登録";
    $list = "アカウント一覧";
}

$top = "<a href = 'diblog.php'>トップ</a>";
$update = "update.php";
$update_com = "update_complete.php";

$accountid = $_POST['number'];
 
$stmt = $pdo->prepare("SELECT * FROM registration WHERE id = ?");

$stmt->execute([$accountid]);

?>

<!doctype HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント更新確認</title>
        <link rel="stylesheet" type="text/css" href="update_confirm.css">
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
        
        <?php
            $maskedPass = substr_replace($_POST['password'],str_repeat("●",strlen($_POST['password'])),0,strlen($_POST['password']));
        ?>
        
        <div id="title">アカウント更新確認画面</div>
        
        <p id="authmsg"></p>
        
        <div id="box">
            <label>名前(姓)</label>  <div id="right"><?php echo $_POST['family_name']; ?></div>
        
            <br>
        
            <label>名前(名)</label>  <div id="right"><?php echo $_POST['last_name']; ?></div>
        
            <br>
        
            <label>カナ(姓)</label>  <div id="right"><?php echo $_POST['family_name_kana']; ?></div>
        
            <br>
        
            <label>カナ(名)</label>  <div id="right"><?php echo $_POST['last_name_kana']; ?></div>
        
            <br>
        
            <label>メールアドレス</label>  <div id="right"><?php echo $_POST['mail']; ?></div>
        
            <br>
        
            <label>パスワード</label>  <div id="right"><?php echo $maskedPass; ?></div>
        
            <br>
        
            <label>性別</label>  <div id="right"><?php echo $_POST['gender']; ?></div>
        
            <br>
        
            <label>郵便番号</label>  <div id="right"><?php echo $_POST['postal_code']; ?></div>
        
            <br>
        
            <label>住所(都道府県)</label>  <div id="right"><?php echo $_POST['prefecture']; ?></div>
        
            <br>
        
            <label>住所(市区町村)</label>  <div id="right"><?php echo $_POST['address_1']; ?></div>
        
            <br>
        
            <label>住所(番地)</label>  <div id="right"><?php echo $_POST['address_2']; ?></div>
        
            <br>
        
            <label>アカウント権限</label>  <div id="right"><?php echo $_POST['authority']; ?></div>
        </div>
        
        <?php
            if($_POST['gender'] == "男"){
                $_POST['gender'] = 0;
            }else{
                $_POST['gender'] = 1;
            }
        
            if($_POST['authority'] == "一般"){
                $_POST['authority'] = 0;
            }else{
                $_POST['authority'] = 1;
            }
        ?>
        
        <form method="post" action="<?php echo $update; ?>">
            <button type="button" onClick=history.back() class="submit">前に戻る</button>
        </form>
        
        <form method="post" action="<?php echo $update_com; ?>">
            <input type="submit" class="submit2" value="登録する">
            <input type="hidden" value="<?php echo $_POST['family_name']; ?>" name="family_name">
            <input type="hidden" value="<?php echo $_POST['last_name']; ?>" name="last_name">
            <input type="hidden" value="<?php echo $_POST['family_name_kana']; ?>" name="family_name_kana">
            <input type="hidden" value="<?php echo $_POST['last_name_kana']; ?>" name="last_name_kana">
            <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
            <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
            <input type="hidden" value="<?php echo $_POST['gender']; ?>" name="gender">
            <input type="hidden" value="<?php echo $_POST['postal_code']; ?>" name="postal_code">
            <input type="hidden" value="<?php echo $_POST['prefecture']; ?>" name="prefecture">
            <input type="hidden" value="<?php echo $_POST['address_1']; ?>" name="address_1">
            <input type="hidden" value="<?php echo $_POST['address_2']; ?>" name="address_2">
            <input type="hidden" value="<?php echo $_POST['authority']; ?>" name="authority">
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