<?php

$family_name = "all_search";
$auth = $_GET['auth'];


header('Location:list.php?family_name='.$family_name.'&auth='.$auth);

?>