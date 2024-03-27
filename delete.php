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
        <title>アカウント削除</title>
        <link rel="stylesheet" type="text/css" href="delete.css">
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
        
        <div id="title">アカウント削除画面</div>
        
        <div id="box">
            
        <?php
            while($row = $stmt->fetch()){
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
                $maskedPass = substr_replace($row['password'],str_repeat("●",strlen($row['password'])),0,strlen($row['password']));


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
            
            echo"<label>パスワード</label><div id='right'>".$maskedPass."</div>";
            
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
            <form method="post" action="delete_confirm.php">
                <input type="submit" class="submit" value="確認する">
                <input type="hidden" name="number" value="<?php echo $accountid; ?>">
            </form>
            
        </div>
        
        <footer>
            <div class="box3">Copyright D.I.works| D.I.blog is the one which provides A to Z about programming</div>
        </footer>
    </body>
</html>