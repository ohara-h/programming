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
?>

<!DOCTYPE HTML>
<html lang="ja">

 <head>
  <meta charset="UTF-8">
  <link rel="stylesheet"type="text/css"href="diblog.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <script>
      $(document).ready(function(){
        $('.abc').bxSlider({
            auto: true,
            speed: 2000,
        });
      });
    </script>

  <title>DIブログ</title>
 </head>
　
 <body>
    
     <div class="logo"><img src="diblog_logo.jpg"></div>
     
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
  <p id="authmsg"></p>
  <main>
      
   <div class="left">
       <div class="abc">
          <div><img src="jQuery_image1.jpg"></div>
          <div><img src="jQuery_image2.jpg"></div>
          <div><img src="jQuery_image3.jpg"></div>
          <div><img src="jQuery_image4.jpg"></div>
          <div><img src="jQuery_image5.jpg"></div> 
       </div>
   </div>
   <div class="right">
    
     <h2>人気の記事</h2>
     <ul class="ul2">
       <li class="li4">PHPオススメ本</li>
       <li class="li4">PHP MYAdminの使い方</li>
       <li class="li4">いま人気のエディタTops</li>
       <li class="li4">HTMLの基礎</li>
     </ul>
    
     <h2>オススメリンク</h2>
     <ul class="ul2">
       <li class="li4">ﾃﾞｨｰｱｲﾜｰｸｽ株式会社</li>
       <li class="li4">XAMPPのダウンロード</li>
       <li class="li4">Eclipseのダウンロード</li>
       <li class="li4">Bracketsのダウンロード</li>
     </ul>
       
    　<h2>カテゴリ</h2>
     <ul class="ul2">
       <li class="li4">HTML</li>
       <li class="li4">PHP</li>
       <li class="li4">MySQL</li>
       <li class="li4">Javascript</li>
     </ul>
       
   </div>
  </main>
     
  <script>
      var auth = <?php echo $auth; ?>;
                if(auth == 0){
                    let authmsg = document.getElementById("authmsg");
                    authmsg.innerHTML = "権限が一般のため、操作できません";
                    authmsg.style.color="red";
                    let elements = document.querySelectorAll('a,input,button,textarea,select');
                    Array.from(elements).forEach(function(element){
                        if(element.tagName.toLowerCase() !== 'a') {
                            element.disabled = true;
                            element.style.pointerEvents = 'none';
                        }
                    });
                }
  </script>
     
  <footer>
      
   <div class="box3">Copyright D.I.works| D.I.blog is the one which provides A to Z about programming</div>
      
  </footer>
     
 </body>
</html>