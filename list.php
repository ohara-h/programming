<?php

mb_internal_encoding("utf8");

$pdo=new PDO("mysql:dbname=lesson1; host=localhost;","root","");

$auth = $_GET['auth'];

if(isset($_GET['family_name'])){
    $family_name = $_GET['family_name'];
}

if(isset($_GET['last_name'])){
    $last_name = $_GET['last_name'];
}

if(isset($_GET['family_name_kana'])){
    $family_name_kana = $_GET['family_name_kana'];
}

if(isset($_GET['last_name_kana'])){
    $last_name_kana = $_GET['last_name_kana'];
}

if(isset($_GET['mail'])){
    $mail = $_GET['mail'];
}

if(isset($_GET['gender'])){
    $getgender = $_GET['gender'];
}

if(isset($_GET['authority'])){
    $getauthority = $_GET['authority'];
}
 
if($auth == 1){
    $regist = "<a href = 'regist.php?auth=".$auth."'>アカウント登録</a>";
    $list = "<a href = 'list.php?auth=".$auth."'>アカウント一覧</a>";
}else{
    $regist = "アカウント登録";
    $list = "アカウント一覧";
}

$delete = "delete.php?auth=".$auth;
$update = "update.php?auth=".$auth;
$list_s = "list_search.php?auth=".$auth;
$list_s_all = "list_search_all.php?auth=".$auth;

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
        
        <form method="post" action="<?php echo $list_s; ?>">
            <table>
                <tr>
                    <td><label>名前(姓)</label></td>
                    <td><input type="text" class="text" name="family_name"></td>
                    <td><label>名前(名)</label></td>
                    <td><input type="text" class="text" name="last_name"></td>
                </tr>
                
                <tr>
                    <td>カナ(姓)</td>
                    <td><input type="text" class="text" name="family_name_kana"></td>
                    <td>カナ(名)</td>
                    <td><input type="text" class="text" name="last_name_kana"></td>
                </tr>
                
                <tr>
                    <td>メールアドレス</td>
                    <td><input type="text" class="text" name="mail"></td>
                    <td>性別</td>
                    <td>
                        <input type="radio" name="gender" value="男" checked>男<input type="radio" name="gender" value="女">女
                    </td>
                </tr>
                
                <tr>
                    <td>アカウント権限</td>
                    <td>
                        <select class="text" name="authority">
                            <option value="一般">一般</option>
                            <option value="管理者">管理者</option>
                        </select>
                    </td>
                    <td colspan="2"></td>
                </tr>
                
                <tr>
                    <td colspan="4"><input type="submit" class="kensaku" value="検索"></td>
                </tr>
            </table>
        </form>
        
        <form method="post" action="<?php echo $list_s_all; ?>">
            <table>
                <tr>
                    <td><input type="submit" class="kensaku" value="全件検索"></td>
                </tr>
            </table>
        </form>
                    
                
        
        <br>
        <br>
        <br>
        
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
                if(isset($family_name) && $family_name == "all_search"){
                    $stmt = $pdo->query("select * from registration ORDER BY id DESC");
                    
                }else if(isset($family_name) && isset($last_name) && isset($family_name_kana) && isset($last_name_kana) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND last_name LIKE ? AND family_name_kana LIKE ? AND last_name_kana LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';
                    $last_name_pattern = '%'.$last_name.'%';
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$family_name_pattern,$last_name_pattern,$family_name_kana_pattern,$last_name_kana_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($last_name) && isset($family_name_kana) && isset($last_name_kana)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND last_name LIKE ? AND family_name_kana LIKE ? AND last_name_kana LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';
                    $last_name_pattern = '%'.$last_name.'%';
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    
                    $stmt->execute([$family_name_pattern,$last_name_pattern,$family_name_kana_pattern,$last_name_kana_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($last_name) && isset($family_name_kana) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND last_name LIKE ? AND family_name_kana LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';
                    $last_name_pattern = '%'.$last_name.'%';
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$family_name_pattern,$last_name_pattern,$family_name_kana_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($last_name) && isset($last_name_kana) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND last_name LIKE ? AND last_name_kana LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';
                    $last_name_pattern = '%'.$last_name.'%';
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$family_name_pattern,$last_name_pattern,$last_name_kana_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($family_name_kana) && isset($last_name_kana) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND family_name_kana LIKE ? AND last_name_kana LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$family_name_pattern,$family_name_kana_pattern,$last_name_kana_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($last_name) && isset($family_name_kana) && isset($last_name_kana) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE last_name LIKE ? AND family_name_kana LIKE ? AND last_name_kana LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $last_name_pattern = '%'.$last_name.'%';
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$last_name_pattern,$family_name_kana_pattern,$last_name_kana_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($last_name) && isset($family_name_kana)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND last_name LIKE ? AND family_name_kana LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';
                    $last_name_pattern = '%'.$last_name.'%';
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    
                    $stmt->execute([$family_name_pattern,$last_name_pattern,$family_name_kana_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($last_name) && isset($last_name_kana)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND last_name LIKE ? AND last_name_kana LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';
                    $last_name_pattern = '%'.$last_name.'%';
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    
                    $stmt->execute([$family_name_pattern,$last_name_pattern,$last_name_kana_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($last_name) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND last_name LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';
                    $last_name_pattern = '%'.$last_name.'%';
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$family_name_pattern,$last_name_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($family_name_kana) && isset($last_name_kana)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND family_name_kana LIKE ? AND last_name_kana LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    
                    $stmt->execute([$family_name_pattern,$family_name_kana_pattern,$last_name_kana_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($family_name_kana) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND family_name_kana LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$family_name_pattern,$family_name_kana_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($last_name_kana) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND last_name_kana LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$family_name_pattern,$last_name_kana_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($last_name) && isset($family_name_kana) && isset($last_name_kana)){
                    $stmt = $pdo->prepare("select * from registration WHERE last_name LIKE ? AND family_name_kana LIKE ? AND last_name_kana LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $last_name_pattern = '%'.$last_name.'%';
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    
                    $stmt->execute([$last_name_pattern,$family_name_kana_pattern,$last_name_kana_pattern,$getgender,$getauthority]);
                    
                }else if(isset($last_name) && isset($family_name_kana) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE last_name LIKE ? AND family_name_kana LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $last_name_pattern = '%'.$last_name.'%';
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$last_name_pattern,$family_name_kana_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($last_name) && isset($last_name_kana) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE last_name LIKE ? AND last_name_kana LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $last_name_pattern = '%'.$last_name.'%';
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$last_name_pattern,$last_name_kana_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name_kana) && isset($last_name_kana) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name_kana LIKE ? AND last_name_kana LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$family_name_kana_pattern,$last_name_kana_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($last_name)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND last_name LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';
                    $last_name_pattern = '%'.$last_name.'%';
                    
                    $stmt->execute([$family_name_pattern,$last_name_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($family_name_kana)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND family_name_kana LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    
                    $stmt->execute([$family_name_pattern,$family_name_kana_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($last_name_kana)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND last_name_kana LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    
                    $stmt->execute([$family_name_pattern,$last_name_kana_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';;
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$family_name_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($last_name) && isset($family_name_kana)){
                    $stmt = $pdo->prepare("select * from registration WHERE last_name LIKE ? AND family_name_kana LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $last_name_pattern = '%'.$last_name.'%';
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    
                    $stmt->execute([$last_name_pattern,$family_name_kana_pattern,$getgender,$getauthority]);
                    
                }else if(isset($last_name) && isset($last_name_kana)){
                    $stmt = $pdo->prepare("select * from registration WHERE last_name LIKE ? AND last_name_kana LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $last_name_pattern = '%'.$last_name.'%';
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    
                    $stmt->execute([$last_name_pattern,$last_name_kana_pattern,$getgender,$getauthority]);
                    
                }else if(isset($last_name) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE last_name LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $last_name_pattern = '%'.$last_name.'%';
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$last_name_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name_kana) && isset($last_name_kana)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name_kana LIKE ? AND last_name_kana LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    
                    $stmt->execute([$family_name_kana_pattern,$last_name_kana_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name_kana) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name_kana LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$family_name_kana_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($last_name_kana) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE last_name_kana LIKE ? AND mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$last_name_kana_pattern,$mail_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_pattern = '%'.$family_name.'%';

                    $stmt->execute([$family_name_pattern,$getgender,$getauthority]);
                    
                }else if(isset($last_name)){
                    $stmt = $pdo->prepare("select * from registration WHERE last_name LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $last_name_pattern = '%'.$last_name.'%';
                    
                    $stmt->execute([$last_name_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name_kana)){
                    $stmt = $pdo->prepare("select * from registration WHERE family_name_kana LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $family_name_kana_pattern = '%'.$family_name_kana.'%';
                    
                    $stmt->execute([$family_name_kana_pattern,$getgender,$getauthority]);
                    
                }else if(isset($family_name) && isset($last_name) && isset($family_name_kana) && isset($last_name_kana) && isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE last_name_kana LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $last_name_kana_pattern = '%'.$last_name_kana.'%';
                    
                    $stmt->execute([$last_name_kana_pattern,$getgender,$getauthority]);
                    
                }else if(isset($mail)){
                    $stmt = $pdo->prepare("select * from registration WHERE mail LIKE ? AND gender = ? AND authority = ? ORDER BY id DESC");
                    
                    $mail_pattern = '%'.$mail.'%';
                    
                    $stmt->execute([$mail_pattern,$getgender,$getauthority]);
                    
                }else{
                    $stmt = $pdo->prepare("select * from registration WHERE gender = ? AND authority = ? ORDER BY id DESC");
                    
                    error_reporting(0);
                    
                    $stmt->execute([$getgender,$getauthority]);
                }
                
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