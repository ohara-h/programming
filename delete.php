<?php

session_start();
$auth = $_SESSION['auth'];

if(!isset($auth)){
    header("Location:login.php");
}

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

if($auth == 1){
    $regist = "<a href = 'regist.php'>アカウント登録</a>";
    $list = "<a href = 'list.php'>アカウント一覧</a>";
}else{
    $regist = "アカウント登録";
    $list = "アカウント一覧";
}

$top = "<a href = 'diblog.php'>トップ</a>";
$delete_con = "delete_confirm.php";

$accountid = $_POST['number'];
 
$stmt = $pdo->prepare("SELECT * FROM registration WHERE id = ?");

$stmt->execute([$accountid]);

?>

<!doctype HTML>

<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント削除</title>
        <link rel="stylesheet" type="text/css" href="delete.css">
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
        
        <div id="title">アカウント削除画面</div>
        
        <p id="authmsg"></p>
        
        <div id="box">
            
        <?php
            while($row = $stmt->fetch()){
                if($row['delete_flag'] == 1){
                echo "<font color='red'>このアカウントは削除済みのため削除できません</font>";
                exit();
                } 
                
                if($row['gender'] == 0){
                    $gender="男";
                }else{
                    $gender="女";
                }
            
                if($row['authority'] == 0){
                    $authority="一般";
                }else{
                    $authority="管理者";
                }

            echo "<label>名前(姓)</label><div id='right'>".$row['family_name']."</div>";
            
            echo"<br>";
            
            echo"<label>名前(名)</label><div id='right'>".$row['last_name']."</div>";
            
            echo"<br>";
            
            echo"<label>カナ(姓)</label><div id='right'>".$row['family_name_kana']."</div>";
            
            echo"<br>";
            
            echo"<label>カナ(名)</label><div id='right'>".$row['last_name_kana']."</div>";
            
            echo"<br>";
            
            echo"<label>メールアドレス</label><div id='right'>".$row['mail']."</div>";
            
            echo"<br>";
            
            echo"<label>性別</label><div id='right'>".$gender."</div>";
            
            echo"<br>";
            
            echo"<label>郵便番号</label><div id='right'>".$row['postal_code']."</div>";
            
            echo"<br>";
            
            echo"<label>住所(都道府県)</label><div id='right'>".$row['prefecture']."</div>";
            
            echo"<br>";
            
            echo"<label>住所(市区町村)</label><div id='right'>".$row['address_1']."</div>";
            
            echo"<br>";
            
            echo"<label>住所(番地)</label><div id='right'>".$row['address_2']."</div>";
            
            echo"<br>";
            
            echo"<label>アカウント権限</label><div id='right'>".$authority."</div>";
        
        }
        ?>
            <form method="post" action="<?php echo $delete_con; ?>">
                <input type="submit" class="submit" value="確認する">
                <input type="hidden" name="number" value="<?php echo $accountid; ?>">
            </form>
            
        </div>
        
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