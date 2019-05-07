<?php
include("simple_html_dom.php");
ini_set('max_execution_time', 300); //300 seconds = 5 minuten

    $array = array();

    $data = file_get_contents ("dumpertlijst.json");
    $json = json_decode($data, true);
    foreach ($json as $value) {
        array_push($array, $value);
    }

    $updateoud = json_encode($array);
    $updateresult = file_put_contents('dumpertlijst2.json', $updateoud);

    $headlines = array();

    $links = array();
    $embed = array();

    $ch=curl_init();
    curl_setopt($ch, CURLOPT_URL,'https://www.dumpert.nl/filmpjes/');
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $query = curl_exec($ch);
    curl_close($ch);

    $html = new simple_html_dom();
    $html->load($query);

    foreach($html->find('a[class=dumpthumb]') as $link){
        $unfiltered = $link->href;
        $embed[] = str_replace('mediabase', 'embed', $unfiltered);
        $links[] = $link->href;
    }

    foreach($html->find('div.details > h1') as $header) {
        $headlines[] = $header->plaintext;
    }

    $jsonarray = json_encode($headlines);

    if(sizeof($headlines) > 0){

        $result = file_put_contents('dumpertlijst.json', $jsonarray);
        if($result){
            $diff = array_diff($array,$headlines);
            if(sizeof($diff) > 0){
                echo '<audio class="audiofile" controls autoplay hidden="" src="alert.mp3" type="audio/mp3">your browser does not support Html5</audio>';
                echo "<script>popmelding();
                        setTimeout(function() {
                          $('.audiofile').remove();
                        }, 1000);</script>";
            }
            echo 'Lijstje: <br>';
            echo '<br>';
            for($x = 0; $x < sizeof($links); $x++){
                echo '<a id="'.$x.'" class="linkbtn" href="#">' .$headlines[$x] . "</a><br>";
                echo '<p class="hidden" id="link'.$x.'">'.$embed[$x].'</p>';
                echo '<p class="hidden" id="info'.$x.'">'.$links[$x].'</p>';
            }

        }
    }else{
        echo 'er is een probleem met je internet<br><button value="Refresh Page" onClick="window.location.reload();">Refresh page</button>';
    }

?>

