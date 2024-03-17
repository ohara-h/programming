<?php

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
    print"<font color='red'>エラーが発生したためアカウント登録できません。</font>";
}catch(Exception $e){
    print"<font color='red'>エラーが発生したためアカウント登録できません。</font>";
}catch(ParseException $pe){
    print"<font color='red'>エラーが発生したためアカウント登録できません。</font>".$pe->getMessage();
}catch(FatalException $fe){
    print"<font color='red'>エラーが発生したためアカウント登録できません。</font>".$fe->getMessage();
}catch(WarningException $we){
     print"<font color='red'>エラーが発生したためアカウント登録できません。</font>".$we->getMessage();
}


mb_internal_encoding("utf8");

$pdo=new PDO("mysql:dbname=lesson1; host=localhost;","root","");

$pdo->exec("insert into registration(family_name,last_name,family_name_kana,last_name_kana,mail,password,gender,postal_code,prefecture,address_1,address_2,authority,registered_time,update_time,delete_flag)values('".$_POST['family_name']."','".$_POST['last_name']."','".$_POST['family_name_kana']."','".$_POST['last_name_kana']."','".$_POST['mail']."','".password_hash($_POST['password'],PASSWORD_DEFAULT)."','".$_POST['gender']."','".$_POST['postal_code']."','".$_POST['prefecture']."','".$_POST['address_1']."','".$_POST['address_2']."','".$_POST['authority']."','$date','$date','0');");

?>

<!doctype HTML>

<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント登録完了画面</title>
        <link rel="stylesheet" type="text/css" href="regist_complete.css">
    </head>
    
    <body>
        <header>
            <div class="box1">
                <ul class="ul1">
                    <li class="li1">トップ</li>
                    <li class="li3">プロフィール</li>
                    <li class="li3">D.I.Blogについて</li>
                    <li class="li3">登録フォーム</li>
                    <li class="li3">問い合わせ</li>
                    <li class="li3"><a href = "regist.php">アカウント登録</a></li>
                    <li class="li3"><a href = "list.php">アカウント一覧</a></li>
                    <li class="li2">その他</li>
                </ul>
            </div>
        </header>
        
        <div id="title">アカウント登録完了画面</div>
        <h1>登録完了しました</h1>
        
        <form action="diblog.html">
            <input type="submit"  class="submit" value="TOPページへ戻る">
        </form>
        
        <footer>
            <div class="box3">Copyright D.I.works| D.I.blog is the one which provides A to Z about programming</div>
        </footer>
    </body>
</html>