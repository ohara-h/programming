<?php

mb_internal_encoding("utf8");

$pdo=new PDO("mysql:dbname=lesson1; host=localhost;","root","");

$accountid = $_POST['number'];
 
$stmt = $pdo->prepare("SELECT * FROM registration WHERE id = ?");

$stmt->execute([$accountid]);

?>

<!doctype HTML>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント登録</title>
        <style>
            .pass{
                -webkit-text-security:disc;
            }
        </style>
        <link rel ="stylesheet" type="text/css" href="update.css">
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
        
        <div id ="title">アカウント登録画面</div>
        
        <form method="post" action="update_confirm.php" name="register">
            <div>
                
                <?php
                    while($row = $stmt->fetch()){
                        
                        $familyname = $row['family_name'];
                        $lastname = $row['last_name'];
                        $familynamekana = $row['family_name_kana'];
                        $lastnamekana = $row['last_name_kana'];
                        $mail = $row['mail'];
                        $postalcode = $row['postal_code'];
                        $address1 = $row['address_1'];
                        $address2 = $row['address_2'];
                        
                        $hkdcheck=($row['prefecture'] =='北海道')?'selected':'';
                        $amrcheck=($row['prefecture'] =='青森県')?'selected':'';
                        $iwtcheck=($row['prefecture'] =='岩手県')?'selected':'';
                        $mygcheck=($row['prefecture'] =='宮城県')?'selected':'';
                        $aktcheck=($row['prefecture'] =='秋田県')?'selected':'';
                        $ymgtcheck=($row['prefecture'] =='山形県')?'selected':'';
                        $hksmcheck=($row['prefecture'] =='福島県')?'selected':'';
                        $ibrkcheck=($row['prefecture'] =='茨城県')?'selected':'';
                        $ttgcheck=($row['prefecture'] =='栃木県')?'selected':'';
                        $gnmcheck=($row['prefecture'] =='群馬県')?'selected':'';
                        $sitmcheck=($row['prefecture'] =='埼玉県')?'selected':'';
                        $tbcheck=($row['prefecture'] =='千葉県')?'selected':'';
                        $tktcheck=($row['prefecture'] =='東京都')?'selected':'';
                        $kngwcheck=($row['prefecture'] =='神奈川県')?'selected':'';
                        $nigtcheck=($row['prefecture'] =='新潟県')?'selected':'';
                        $tymcheck=($row['prefecture'] =='富山県')?'selected':'';
                        $iskwcheck=($row['prefecture'] =='石川県')?'selected':'';
                        $hkicheck=($row['prefecture'] =='福井県')?'selected':'';
                        $ymnscheck=($row['prefecture'] =='山梨県')?'selected':'';
                        $ngncheck=($row['prefecture'] =='長野県')?'selected':'';
                        $gfcheck=($row['prefecture'] =='岐阜県')?'selected':'';
                        $szokcheck=($row['prefecture'] =='静岡県')?'selected':'';
                        $aitcheck=($row['prefecture'] =='愛知県')?'selected':'';
                        $mecheck=($row['prefecture'] =='三重県')?'selected':'';
                        $sgcheck=($row['prefecture'] =='滋賀県')?'selected':'';
                        $kytcheck=($row['prefecture'] =='京都府')?'selected':'';
                        $oskcheck=($row['prefecture'] =='大阪府')?'selected':'';
                        $hygcheck=($row['prefecture'] =='兵庫県')?'selected':'';
                        $nrcheck=($row['prefecture'] =='奈良県')?'selected':'';
                        $wkymcheck=($row['prefecture'] =='和歌山県')?'selected':'';
                        $ttrcheck=($row['prefecture'] =='鳥取県')?'selected':'';
                        $smncheck=($row['prefecture'] =='島根県')?'selected':'';
                        $okymcheck=($row['prefecture'] =='岡山県')?'selected':'';
                        $hrsmcheck=($row['prefecture'] =='広島県')?'selected':'';
                        $ymgticheck=($row['prefecture'] =='山口県')?'selected':'';
                        $tksmcheck=($row['prefecture'] =='徳島県')?'selected':'';
                        $kgwcheck=($row['prefecture'] =='香川県')?'selected':'';
                        $ehmcheck=($row['prefecture'] =='愛媛県')?'selected':'';
                        $kutcheck=($row['prefecture'] =='高知県')?'selected':'';
                        $hkokcheck=($row['prefecture'] =='福岡県')?'selected':'';
                        $sgcheck=($row['prefecture'] =='佐賀県')?'selected':'';
                        $ngskcheck=($row['prefecture'] =='長崎県')?'selected':'';
                        $kmmtcheck=($row['prefecture'] =='熊本県')?'selected':'';
                        $oitcheck=($row['prefecture'] =='大分県')?'selected':'';
                        $myzkcheck=($row['prefecture'] =='宮崎県')?'selected':'';
                        $kgsmcheck=($row['prefecture'] =='鹿児島県')?'selected':'';
                        $oknwcheck=($row['prefecture'] =='沖縄県')?'selected':'';
                        
                        if($row['gender'] == 0){
                            $gendermale="checked";
                            $genderfemale="";
                        }else{
                            $gendermale="";
                            $genderfemale="checked";
                        }
            
                        if($row['authority'] == 0){
                            $authorityg="selected";
                            $authoritym="";
                        }else{
                            $authorityg="";
                            $authoritym="selected";
                        }
                    }
                ?>
                
                <label>名前(姓)</label>
                <div id='left'><input type='text' id='inputValue' class='text' maxlength='10' pattern='[\u4E00-\u9FFF\u3040-\u309F‾]*' value="<?php echo $familyname; ?>" name="family_name"></div>
                <div id='err1'></div>
            </div>
            
            <br>
            
            <div>
                <label>名前(名)</label>
                <div id='left'><input type='text' id='inputValue' class='text' maxlength='10' pattern='[\u4E00-\u9FFF\u3040-\u309F‾]*' value="<?php echo $lastname; ?>" name='last_name'></div>
                <div id='err2'></div>
            </div>
                
            <br>
            
            <div>
                <label>カナ(姓)</label>
                <div id='left'><input type='text' id='inputValue' class='text' maxlength='10' pattern='[\u30A1-\u30F6]*' value="<?php echo $familynamekana; ?>" name='family_name_kana'></div>
                <div id='err3'></div>
            </div>
                
            <br>
            
            <div>
                <label>カナ(名)</label>
                <div id='left'><input type='text' id='inputValue' class='text' maxlength='10' pattern='[\u30A1-\u30F6]*' value="<?php echo $lastnamekana; ?>" name='last_name_kana'></div>
                <div id='err4'></div>
            </div>
                
            <br>
            
            <div>
                <label>メールアドレス</label>
                <div id='left'><input type='text' id='inputValue' class='text' maxlength='100' pattern='^[0-9A-Za-z@\-]+$' value="<?php echo $mail; ?>" name='mail'></div>
                <div id='err5'></div>
            </div>
                
            <br>
            
            <div>
                <label>パスワード</label>
                <div id='left'><input type='text' class='pass' maxlength='10' pattern='^[a-zA-Z0-9]+$' name='password'></div>
                <div id="pass">未入力の場合、パスワードは更新されません。</div>
            </div>
                
            <br>
            
            <div>
                <label>性別</label>
                <div id='left'><input type='radio' id='inputValue' class='text' name='gender' value='男' <?php echo $gendermale; ?>>男
                <input type="radio" class="text" name="gender" value="女" <?php echo $genderfemale; ?>>女</div>
            </div>
                
            <br>
            
            <div>
                <label>郵便番号</label>
                <div id="left"><input type="text" id='inputValue' class="text" maxlength="7" pattern="^[0-9]+$" value="<?php echo $postalcode; ?>" name="postal_code"></div>
                <div id="err7"></div>
            </div>
                
            <br>
            
            <div>
                <label>住所(都道府県)</label>
                <div id="left"><select class="text" id='inputValue' name="prefecture">
                    <option value=""></option>
                    <option value="北海道" <?php echo $hkdcheck; ?>>北海道</option>
                    <option value="青森県" <?php echo $amrcheck; ?>>青森県</option>
                    <option value="岩手県" <?php echo $iwtcheck; ?>>岩手県</option>
                    <option value="宮城県" <?php echo $mygcheck; ?>>宮城県</option>
                    <option value="秋田県" <?php echo $aktcheck; ?>>秋田県</option>
                    <option value="山形県" <?php echo $ymgtcheck; ?>>山形県</option>
                    <option value="福島県" <?php echo $hksmcheck; ?>>福島県</option>
                    <option value="茨城県" <?php echo $ibrkcheck; ?>>茨城県</option>
                    <option value="栃木県" <?php echo $ttgcheck; ?>>栃木県</option>
                    <option value="群馬県" <?php echo $gnmcheck; ?>>群馬県</option>
                    <option value="埼玉県" <?php echo $sitmcheck; ?>>埼玉県</option>
                    <option value="千葉県" <?php echo $tbcheck; ?>>千葉県</option>
                    <option value="東京都" <?php echo $tktcheck; ?>>東京都</option>
                    <option value="神奈川県" <?php echo $kngwcheck; ?>>神奈川県</option>
                    <option value="新潟県" <?php echo $nigtcheck; ?>>新潟県</option>
                    <option value="富山県" <?php echo $tymcheck; ?>>富山県</option>
                    <option value="石川県" <?php echo $iskwcheck; ?>>石川県</option>
                    <option value="福井県" <?php echo $hkicheck; ?>>福井県</option>
                    <option value="山梨県" <?php echo $ymnscheck; ?>>山梨県</option>
                    <option value="長野県" <?php echo $ngncheck; ?>>長野県</option>
                    <option value="岐阜県" <?php echo $gfcheck; ?>>岐阜県</option>
                    <option value="静岡県" <?php echo $szokcheck; ?>>静岡県</option>
                    <option value="愛知県" <?php echo $aitcheck; ?>>愛知県</option>
                    <option value="三重県" <?php echo $mecheck; ?>>三重県</option>
                    <option value="滋賀県" <?php echo $sgcheck; ?>>滋賀県</option>
                    <option value="京都府" <?php echo $kytcheck; ?>>京都府</option>
                    <option value="大阪府" <?php echo $oskcheck; ?>>大阪府</option>
                    <option value="兵庫県" <?php echo $hygcheck; ?>>兵庫県</option>
                    <option value="奈良県" <?php echo $nrcheck; ?>>奈良県</option>
                    <option value="和歌山県" <?php echo $wkymcheck; ?>>和歌山県</option>
                    <option value="鳥取県" <?php echo $ttrcheck; ?>>鳥取県</option>
                    <option value="島根県" <?php echo $smncheck; ?>>島根県</option>
                    <option value="岡山県" <?php echo $okymcheck; ?>>岡山県</option>
                    <option value="広島県" <?php echo $hrsmcheck; ?>>広島県</option>
                    <option value="山口県" <?php echo $ymgticheck; ?>>山口県</option>
                    <option value="徳島県" <?php echo $tksmcheck; ?>>徳島県</option>
                    <option value="香川県" <?php echo $kgwcheck; ?>>香川県</option>
                    <option value="愛媛県" <?php echo $ehmcheck; ?>>愛媛県</option>
                    <option value="高知県" <?php echo $kutcheck; ?>>高知県</option>
                    <option value="福岡県" <?php echo $hkokcheck; ?>>福岡県</option>
                    <option value="佐賀県" <?php echo $sgcheck; ?>>佐賀県</option>
                    <option value="長崎県" <?php echo $ngskcheck; ?>>長崎県</option>
                    <option value="熊本県" <?php echo $kmmtcheck; ?>>熊本県</option>
                    <option value="大分県" <?php echo $oitcheck; ?>>大分県</option>
                    <option value="宮崎県" <?php echo $myzkcheck; ?>>宮崎県</option>
                    <option value="鹿児島県" <?php echo $kgsmcheck; ?>>鹿児島県</option>
                    <option value="沖縄県" <?php echo $oknwcheck; ?>>沖縄県</option>
                </select></div>
                <div id="err8"></div>
            </div>
                
            <br>
            
            <div>
                <label>都道府県(市区町村)</label>
                <div id="left"><input type="text" id='inputValue' class="text" maxlength="10" pattern="[\u3040-\u309F\u4E00-\u9FAF0-9\u30A0-\u30FF\u30FC\uFF10-\uFF19\uFF0D\s\-]+" value="<?php echo $address1; ?>" name="address_1"></div>
                <div id="err9"></div>
            </div>
                
            <br>
            
            <div>
                <label>都道府県(番地)</label>
                <div id="left"><input type="text" id='inputValue' class="text" maxlength="100" pattern="[\u3040-\u309F\u4E00-\u9FAF0-9\u30A0-\u30FF\u30FC\uFF10-\uFF19\uFF0D\s\-]+" value="<?php echo $address2; ?>" name="address_2"></div>
                <div id="err10"></div>
            </div>
                
            <br>
            
            <div>
                <label>アカウント権限</label>
                <div id="left"><select class="text" id='inputValue' name="authority">
                    <option value="一般" <?php echo $authorityg; ?>>一般</option>
                    <option value="管理者" <?php echo $authoritym; ?>>管理者</option>
                </select></div>
            </div>
                
            <br>
            
            <div>
                <input type="submit" class="submit" onClick="return runAllFunctions();" value="確認する">
                <input type="hidden" name="number" value="<?php echo $accountid; ?>">
            </div>
            
            <br>
            
        </form>
        
        <script type="text/javascript">
                function check1(){
                    if(register.family_name.value == ""){
                        let err1 = document.getElementById("err1");
                        err1.innerHTML = "名前(姓)が未入力です";
                        err1.style.color="red";
                        err1.style.marginLeft="60px";
                        return 1;
                    }
                }
            
                function check2(){
                    if(register.last_name.value == ""){
                        let err2 = document.getElementById("err2");
                        err2.innerHTML = "名前(名)が未入力です";
                        err2.style.color="red";
                        err2.style.marginLeft="60px";
                        return 1;
                    }
                }
            
                function check3(){
                    if(register.family_name_kana.value == ""){
                        let err3 = document.getElementById("err3");
                        err3.innerHTML = "カナ(姓)が未入力です";
                        err3.style.color="red";
                        err3.style.marginLeft="60px";
                        return 1;
                    }
                }
            
                function check4(){
                    if(register.last_name_kana.value == ""){
                        let err4 = document.getElementById("err4");
                        err4.innerHTML = "カナ(名)が未入力です";
                        err4.style.color="red";
                        err4.style.marginLeft="60px";
                        return 1;
                    }
                }
            
                function check5(){
                    if(register.mail.value == ""){
                        let err5 = document.getElementById("err5");
                        err5.innerHTML = "メールアドレスが未入力です";
                        err5.style.color="red";
                        err5.style.marginLeft="60px";
                        return 1;
                    }
                }
            
                function check7(){
                    if(register.postal_code.value == ""){
                        let err7 = document.getElementById("err7");
                        err7.innerHTML = "郵便番号が未入力です";
                        err7.style.color="red";
                        err7.style.marginLeft="60px";
                        return 1;
                    }
                }
            
                function check8(){
                    if(register.prefecture.value == ""){
                        let err8 = document.getElementById("err8");
                        err8.innerHTML = "住所(都道府県)が未選択です";
                        err8.style.color="red";
                        err8.style.marginLeft="60px";
                        return 1;
                    }
                }
            
                function check9(){
                    if(register.address_1.value == ""){
                        let err9 = document.getElementById("err9");
                        err9.innerHTML = "都道府県(市区町村)が未入力です";
                        err9.style.color="red";
                        err9.style.marginLeft="60px";
                        return 1;
                    }
                }
            
                function check10(){
                    if(register.address_2.value == ""){
                        let err10 = document.getElementById("err10");
                        err10.innerHTML = "都道府県(番地)が未入力です";
                        err10.style.color="red";
                        err10.style.marginLeft="60px";
                        return 1;
                    }
                }
            
            function runAllFunctions(){
                check1();
                check2();
                check3();
                check4();
                check5();
                check7();
                check8();
                check9();
                check10();
                
                if(check1()==1 || check2()==1 || check3()==1 || check4()==1 || check5()==1 || check7()==1 || check8()==1 || check9()==1 || check10()==1){
                    return false;
                }else{
                    return true;
                }
            }
            

        </script>
        
        <footer>
            <div class="box3">Copyright D.I.works| D.I.blog is the one which provides A to Z about programming</div>
        </footer>
    </body>
</html>