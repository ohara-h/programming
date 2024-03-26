<?php

mb_internal_encoding("utf8");

$pdo=new PDO("mysql:dbname=lesson1; host=localhost;","root","");

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
        
        <?php
            $maskedPass = substr_replace($_POST['password'],str_repeat("●",strlen($_POST['password'])),0,strlen($_POST['password']));
        ?>
        
        <div id="title">アカウント更新確認画面</div>
        
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
        
        <form action="update.php">
            <button type="button" onClick=history.back() class="submit">前に戻る</button>
        </form>
        
        <form method="post" action="update_complete.php">
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
    </body>
</html>