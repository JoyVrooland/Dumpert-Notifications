<?php
session_start();
if($_POST["status"] == "commentToggle"){
    $val = $_POST['val'];
    if(strlen($val) > 0){
        $_SESSION['comments'] = $_POST['val'];
    }
    echo $_POST['val'];
}

if($_POST["status"] == "checkToggleState"){
    echo $_SESSION['comments'];
}
?>