<?php

mb_internal_encoding("utf8");

$pdo=new PDO("mysql:dbname=lesson1; host=localhost;","root","");

$stmt = $pdo->query("select * from registration ORDER BY id DESC");

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
        
        <h1>アカウント一覧画面</h1>
        
        <div class='box'>
            <div class='info'>ID<br></div>
            <div class='info'>名前(姓)<br></div>
            <div class='info'>名前(名)<br></div>
            <div class='info'>カナ(姓)<br></div>
            <div class='info'>カナ(名)<br></div>
            <div class='info'>メールアドレス<br></div>
            <div class='info'>性別<br></div>
            <div class='info'>アカウント権限<br></div>
            <div class='info'>削除フラグ<br></div>
            <div class='info'>登録日時<br></div>
            <div class='info'>更新日時<br></div>
            <div class='info'>操作<br></div>
        </div>
        
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
            
            if($row['delete_flag'] == 0){
                $deleteflag="有効";
            }else{
                $deleteflag="無効";
            }
            
            $registeredtime = date("Y/m/d",strtotime($row['registered_time']));
            $updatetime = date("Y/m/d",strtotime($row['update_time']));
            
                echo "<div class='box'>";
                    echo "<div class='info'><div>".$row['id']."</div></div>";
                    echo "<div class='info'><div>".$row['family_name']."</div></div>";
                    echo "<div class='info'><div>".$row['last_name']."</div></div>";
                    echo "<div class='info'><div>".$row['family_name_kana']."</div></div>";
                    echo "<div class='info'><div>".$row['last_name_kana']."</div></div>";
                    echo "<div class='info'><div>".$row['mail']."</div></div>";
                    echo "<div class='info'><div>".$gender."</div></div>";
                    echo "<div class='info'><div>".$authority."</div></div>";
                    echo "<div class='info'><div>".$deleteflag."</div></div>";
                    echo "<div class='info'><div>".$registeredtime."</div></div>";
                    echo "<div class='info'><div>".$updatetime."</div></div>";
                    echo "<div class='info'>";
                        echo "<form action='delete.php'>";
                            echo "<input type='submit' class='delete' value='削除'>";
                        echo "</form>";
                    
                        echo "<form action='update.php'>";
                            echo "<input type='submit' class='update' value='更新'>";
                        echo "</form>";
                    echo"</div>";
                echo "</div>";
        }
        ?>
        
        <footer>
            <div class="box3">Copyright D.I.works| D.I.blog is the one which provides A to Z about programming</div>
        </footer>
    </body>
</html>