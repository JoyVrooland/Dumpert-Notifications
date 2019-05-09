<?php
include("simple_html_dom.php");
ini_set('max_execution_time', 300); //300 seconds = 5 minuten

    $site = $_POST['site'];

    $site = parse_url($site);

    $site = $site['path'];

    $site = explode('/', $site);

    echo 'https://comments.dumpert.nl/embed/'.$site[2].'/'.$site[3].'/comments/';

?>

