<?php

mb_internal_encoding("utf8");

$pdo=new PDO("mysql:dbname=lesson1; host=localhost;","root","");

$auth = $_GET['auth'];
 
if($auth == 1){
    $regist = "<a href = 'regist.php?auth=".$auth."'>アカウント登録</a>";
    $list = "<a href = 'list.php?auth=".$auth."'>アカウント一覧</a>";
}else{
    $regist = "アカウント登録";
    $list = "アカウント一覧";
}

$delete = "delete.php?auth=".$auth;
$update = "update.php?auth=".$auth;


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
                    <li class="li3"><?php echo $regist; ?></li>
                    <li class="li3"><?php echo $list; ?></li>
                    <li class="li2">その他</li>
                </ul>
            </div>
        </header>
        
        <h1>アカウント一覧画面</h1>
        
        <p id="authmsg"></p>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前(姓)</th>
                    <th>名前(名)</th>
                    <th>カナ(姓)</th>
                    <th>カナ(名)</th>
                    <th>メールアドレス</th>
                    <th>性別</th>
                    <th>アカウント権限</th>
                    <th>削除フラグ</th>
                    <th>登録日時</th>
                    <th>更新日時</th>
                    <th>操作</th>
                </tr>
            </thead>
            
            <tbody>
                    
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
                    $deleteflag="無効";
                }else{
                    $deleteflag="有効";
                }
            
                $registeredtime = date("Y/m/d",strtotime($row['registered_time']));
                $updatetime = date("Y/m/d",strtotime($row['update_time']));
                  
                echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['family_name']."</td>";
                    echo "<td>".$row['last_name']."</td>";
                    echo "<td>".$row['family_name_kana']."</td>";
                    echo "<td>".$row['last_name_kana']."</td>";
                    echo "<td>".$row['mail']."</td>";
                    echo "<td>".$gender."</td>";
                    echo "<td>".$authority."</td>";
                    echo "<td>".$deleteflag."</td>";
                    echo "<td>".$registeredtime."</td>";
                    echo "<td>".$updatetime."</td>";
                    echo "<td>";
                        echo "<form method='post' action='".$delete."'>";
                            echo "<input type='submit' class='delete' value='削除'>";
                            echo "<input type='hidden' name='number' value='".$row['id']."'>";
                        echo "</form>";
                    
                        echo "<form method='post' action='".$update."'>";
                            echo "<input type='submit' class='update' value='更新'>";
                            echo "<input type='hidden' name='number' value='".$row['id']."'>";
                        echo "</form>";
                    echo "</td>";
                echo "<tr>";
        }
        ?>
            </tbody>
        </table>
        
        
        
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