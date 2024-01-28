<!doctype HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント登録確認</title>
        <link rel="stylesheet" type="text/css" href="regist_confirm.css">
    </head>
    
    <body>
        <h1>アカウント登録確認画面</h1>
        
        <p>名前(姓)  <?php echo $_POST['family_name']; ?></p>
        
        <br>
        
        <p>名前(名)  <?php echo $_POST['last_name']; ?></p>
        
        <br>
        
        <p>カナ(姓)  <?php echo $_POST['family_name_kana']; ?></p>
        
        <br>
        
        <p>カナ(名)  <?php echo $_POST['last_name_kana']; ?></p>
        
        <br>
        
        <p>メールアドレス  <?php echo $_POST['mail']; ?></p>
        
        <br>
        
        <p>パスワード  <?php echo $_POST['password']; ?></p>
        
        <br>
        
        <p>性別  <?php echo $_POST['gender']; ?></p>
        
        <br>
        
        <p>郵便番号  <?php echo $_POST['postal_code']; ?></p>
        
        <br>
        
        <p>住所(都道府県)  <?php echo $_POST['prefecture']; ?></p>
        
        <br>
        
        <p>住所(市区町村)  <?php echo $_POST['address_1']; ?></p>
        
        <br>
        
        <p>住所(番地)  <?php echo $_POST['address_2']; ?></p>
        
        <br>
        
        <p>アカウント権限  <?php echo $_POST['authority']; ?></p>
        
        <form action="regist.php">
            <input type="submit" class="button" value="前に戻る">
        </form>
        
        <form method="post" action="regist_complete.php">
            <input type="submit" class="button" value="登録する">
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
        </form>
    </body>
</html>