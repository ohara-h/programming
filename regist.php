<!doctype HTML>
<html lang = "ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント登録</title>
        <link rel ="stylesheet" type="text/css" href="regist.css">
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
                    <li class="li3">アカウント登録</li>
                    <li class="li2">その他</li>
                </ul>
            </div>
        </header>
        
        <div id ="title">アカウント登録画面</div>
        
        <form method="post" action="regist_confirm.php" name="register">
            <div>
                <label>名前(姓)</label>
                <div id="left"><input type="text" class="text" maxlength="10" pattern="[\u4E00-\u9FFF\u3040-\u309F‾]*" name="family_name"></div>
                <div id="err1"></div>
            </div>
            
            <br>
            
            <div>
                <label>名前(名)</label>
                <div id="left"><input type="text" class="text" maxlength="10" pattern="[\u4E00-\u9FFF\u3040-\u309F‾]*" name="last_name"></div>
                <div id="err2"></div>
            </div>
                
            <br>
            
            <div>
                <label>カナ(姓)</label>
                <div id="left"><input type="text" class="text" maxlength="10" pattern="[\u30A1-\u30F6]*" name="family_name_kana"></div>
                <div id="err3"></div>
            </div>
                
            <br>
            
            <div>
                <label>カナ(名)</label>
                <div id="left"><input type="text" class="text" maxlength="10" pattern="[\u30A1-\u30F6]*" name="last_name_kana"></div>
                <div id="err4"></div>
            </div>
                
            <br>
            
            <div>
                <label>メールアドレス</label>
                <div id="left"><input type="text" class="text" maxlength="100" pattern="^[0-9A-Za-z@\-]+$"name="mail"></div>
                <div id="err5"></div>
            </div>
                
            <br>
            
            <div>
                <label>パスワード</label>
                <div id="left"><input type="password" class="text" maxlength="10" pattern="^[a-zA-Z0-9]+$" name="password"></div>
                <div id="err6"></div>
            </div>
                
            <br>
            
            <div>
                <label>性別</label>
                <div id="left"><input type="radio" class="text" name="gender" value="男" checked>男
                <input type="radio" class="text" name="gender" value="女">女</div>
            </div>
                
            <br>
            
            <div>
                <label>郵便番号</label>
                <div id="left"><input type="text" class="text" maxlength="7" pattern="^[0-9]+$" name="postal_code"></div>
                <div id="err7"></div>
            </div>
                
            <br>
            
            <div>
                <label>住所(都道府県)</label>
                <div id="left"><select class="text" name="prefecture">
                    <option value=""></option>
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                </select></div>
                <div id="err8"></div>
            </div>
                
            <br>
            
            <div>
                <label>都道府県(市区町村)</label>
                <div id="left"><input type="text" class="text" maxlength="10" pattern="[\u3040-\u309F\u4E00-\u9FAF0-9\u30A0-\u30FF\u30FC\s\-]+" name="address_1"></div>
                <div id="err9"></div>
            </div>
                
            <br>
            
            <div>
                <label>都道府県(番地)</label>
                <div id="left"><input type="text" class="text" maxlength="100" pattern="[\u3040-\u309F\u4E00-\u9FAF0-9\u30A0-\u30FF\u30FC\s\-]+" name="address_2"></div>
                <div id="err10"></div>
            </div>
                
            <br>
            
            <div>
                <label>アカウント権限</label>
                <div id="left"><select class="text" name="authority">
                    <option value="一般">一般</option>
                    <option value="管理者">管理者</option>
                </select></div>
            </div>
                
            <br>
            
            <div>
                <input type="submit" class="submit" onClick="return runAllFunctions();" value="確認する">
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
            
                function check6(){
                    if(register.password.value == ""){
                        let err6 = document.getElementById("err6");
                        err6.innerHTML = "パスワードが未入力です";
                        err6.style.color="red";
                        err6.style.marginLeft="60px";
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
                check6();
                check7();
                check8();
                check9();
                check10();
                
                if(check1()==1 || check2()==1  || check3()==1 || check4()==1 || check5()==1 || check6()==1 || check7()==1 || check8()==1 || check9()==1 || check10()==1){
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