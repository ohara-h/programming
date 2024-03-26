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
        <title>アカウント削除確認画面</title>
        <link rel="stylesheet" type="text/css" href="delete_confirm.css">
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
        <h1>本当に削除してよろしいですか？</h1>
        
        <form  method="post" action="delete.php">
            <input type="submit"  onClick=history.back() class="submit" value="前に戻る">
            <input type="hidden" name="number" value="<?php echo $accountid; ?>">
        </form>
        
        <form method="post" action="delete_complete.php">
            <input type="submit"  class="submit2" value="削除する">
            <input type="hidden" name="number" value="<?php echo $accountid; ?>">
        </form>
        
        <footer>
            <div class="box3">Copyright D.I.works| D.I.blog is the one which provides A to Z about programming</div>
        </footer>
    </body>
</html>