<!doctype HTML>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>ログイン画面</title>
        <link rel ="stylesheet" type="text/css" href="login.css">
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
        
        <div id ="title">ログイン画面</div>
        
        <form method="post" action="login_check.php">
            
            <label>メールアドレス</label>
                <div>
                    <div id="left"><input type="text" class="text" maxlength="100" pattern="^[0-9A-Za-z@\-]+$" name="mail"></div>
                </div>
            
            <br>
        
            <label>パスワード</label>
                <div>
                    <div id="left"><input type="password" class="text" maxlength="10" pattern="^[a-zA-Z0-9]+$" name="password"></div>
                
                </div>
            
            <br>
            
            <?php if(isset($_GET['error'])){ ?>
                <p class="error" style="color: red;"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            
            <div>
                <input type="submit" class="submit" value="ログイン">
            </div>
        </form>
        
        <footer>
            <div class="box3">Copyright D.I.works| D.I.blog is the one which provides A to Z about programming</div>
        </footer>
    </body>
</html>