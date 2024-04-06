<?php

$family_name = $_POST['family_name'];
$last_name = $_POST['last_name'];
$family_name_kana = $_POST['family_name_kana'];
$last_name_kana = $_POST['last_name_kana'];
$mail = $_POST['mail'];
$auth = $_GET['auth'];

if($_POST['gender'] == "男"){
    $gender = 0;
}else{
    $gender = 1;
}
        
if($_POST['authority'] == "一般"){
    $authority = 0;
}else{
    $authority = 1;
}

header('Location:list.php?family_name='.$family_name.'&last_name='.$last_name.'&family_name_kana='.$family_name_kana.'&last_name_kana='.$last_name_kana.'&mail='.$mail.'&gender='.$gender.'&authority='.$authority.'&auth='.$auth);

?>