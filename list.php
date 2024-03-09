<?php

mb_internal_encoding("utf8");

$pdo=new PDO("mysql:dbname=lesson1; host=localhost;","root","");

$stmt = $pdo->query("select * from registration");

?>

<!doctype HTML>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント一覧</title>
        <link rel="stylesheet" type="text/css" href="list.css">
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
        
        while($row = $stmt->fetch()){
            echo"<ul class='ul2'>";
                echo"<li class='li4'>ID<br><div>".$row['id']."</div></li>";
                echo"<li class='li4'>名前(姓)<br><div>".$row['family_name']."</div></li>";
                echo"<li class='li4'>名前(名)<br><div>".$row['last_name']."</div></li>";
                echo"<li class='li4'>カナ(姓)<br><div>".$row['family_name_kana']."</div></li>";
                echo"<li class='li4'>カナ(名)<br><div>".$row['last_name_kana']."</div></li>";
                echo"<li class='li4'>メールアドレス<br><div>".$row['mail']."</div></li>";
                echo"<li class='li4'>性別<br><div>".$row['gender']."</div></li>";
                echo"<li class='li4'>アカウント権限<br><div>".$row['authority']."</div></li>";
                echo"<li class='li4'>削除フラグ<br><div>".$row['delete_flag']."</div></li>";
                echo"<li class='li4'>登録日時<br><div>".$row['registered_time']."</div></li>";
                echo"<li class='li4'>更新日時<br><div>".$row['update_time']."</div></li>";
                echo"<li class='li4'>操作<br>";
                    echo"<form action='delete.php'>";
                        echo"<input type='submit' class='delete' value='削除'>";
                    echo"</form>";
                    
                    echo"<form action='update.php'>";
                        echo"<input type='submit' class='update' value='更新'>";
                    echo"</form>";
                echo"</li>";
            echo"</ul>";
        }
        ?>
        
        <footer>
            <div class="box3">Copyright D.I.works| D.I.blog is the one which provides A to Z about programming</div>
        </footer>
    </body>
</html>