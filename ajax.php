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

if($_POST["status"] == "nightmodeToggle"){
    $val = $_POST['val'];
    if(strlen($val) > 0){
        $_SESSION['nightmode'] = $_POST['val'];
    }
    echo $_SESSION['nightmode'];
}

if($_POST["status"] == "checkNightmodeState"){
    echo $_SESSION['nightmode'];
}
?>