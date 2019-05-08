<?php
include("simple_html_dom.php");
ini_set('max_execution_time', 300); //300 seconds = 5 minuten

    $site = $_POST['site'];

    $comments = array();

    $ch=curl_init();
    curl_setopt($ch, CURLOPT_URL,$site);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $query = curl_exec($ch);
    curl_close($ch);

    $html = new simple_html_dom();
    $html->load($query);

    foreach($html->find('iframe[id=comments]') as $comment) {
        $headlines[] = $header->plaintext;
    }


?>

