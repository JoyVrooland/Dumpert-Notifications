<?php
include("simple_html_dom.php");
ini_set('max_execution_time', 300); //300 seconds = 5 minuten

    $filter = $_POST['filter'];
    $melding = ($_POST['silent'] != '') ? $_POST['silent'] : '';

    if($filter === 'alleenfilmpjes'){
        $target = 'alleenfilmpjes.json';
        $array = array();
        $site = 'https://www.dumpert.nl/filmpjes/';
        $data = file_get_contents ("alleenfilmpjes.json");
        $json = json_decode($data, true);
        foreach ($json as $value) {
            array_push($array, $value);
        }

        $updateoud = json_encode($array);
        $updateresult = file_put_contents('alleenfilmpjes2.json', $updateoud);
    }elseif($filter === 'alleenplaatjes'){
        $target = 'alleenplaatjes.json';
        $array = array();
        $site = 'https://www.dumpert.nl/plaatjes/';
        $data = file_get_contents ("alleenplaatjes.json");
        $json = json_decode($data, true);
        foreach ($json as $value) {
            array_push($array, $value);
        }

        $updateoud = json_encode($array);
        $updateresult = file_put_contents('alleenplaatjes.json', $updateoud);
    }else{
        $target = 'alles.json';
        $array = array();
        $site = 'https://www.dumpert.nl/';
        $data = file_get_contents ("alles.json");
        $json = json_decode($data, true);
        foreach ($json as $value) {
            array_push($array, $value);
        }

        $updateoud = json_encode($array);
        $updateresult = file_put_contents('alles2.json', $updateoud);
    }

    $headlines = array();
    $links = array();
    $embed = array();
    $images = array();
    $imgname = array();
    $stats = array();
    $date = array();
    $desc = array();
    $count = 0;
    $dumbthumb = array();
    $dumbtype = array();


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

    foreach($html->find('a[class=dumpthumb]') as $link){
        $unfiltered = $link->href;
        $embed[] = str_replace('mediabase', 'embed', $unfiltered);
        $links[] = $link->href;
    }

    foreach($html->find('div.details > h1') as $header) {
        $headlines[] = $header->plaintext;
    }

    foreach($html->find('div.details > date') as $datum) {
        $date[] = $datum->plaintext;
    }

    foreach($html->find('a[class=dumpthumb] img') as $image) {
        $images[] = $image->getAttribute('src');
    }

    foreach($html->find('div.details p.stats') as $stat) {
        $stats[] = $stat->plaintext;
    }

    foreach($html->find('div.details > p.description') as $description) {
        $desc[] = $description->plaintext;
    }

    foreach($html->find('a[class=dumpthumb] > span') as $typeof){
        $dumbtype[] = $typeof->attr['class'];
    }

$jsonarray = json_encode($headlines);

    if(sizeof($headlines) > 0){

        $result = file_put_contents($target, $jsonarray);
        if($result){
            $diff = array_diff($array,$headlines);
            for($y = 0; $y < sizeof($images); $y++){
                $picturename = $images[$y];
                $picturename = parse_url($picturename);
                $picturename = $picturename['path'];
                $picturename = explode('/', $picturename);
                $imgname[] = $picturename[2];
            }
            if(sizeof($diff) > 0){
                echo '<audio class="audiofile" controls autoplay hidden="" src="alert.mp3" type="audio/mp3">your browser does not support Html5</audio>';
                if($melding !== 'silent'){
                    echo "<script>popmelding();
                        setTimeout(function() {
                          $('.audiofile').remove();
                        }, 1000);</script>";
                }
                for($a = 0; $a < sizeof($images); $a++){
                    $content = file_get_contents($images[$a]);
                    $path = 'thumbs/'.$imgname[$a];
                    file_put_contents($path, $content);
//                copy($images[$a], 'thumbs/'.$a.'.jpg');
                }
            }

            for($x = 0; $x < sizeof($links); $x++){
                if($dumbtype[$x] == 'video'){
                    echo '<a id="'.$x.'" href="#" class="dumpthumb linkbtn" title="'.$headlines[$x].'">
                         <img src="thumbs/'.$imgname[$x].'" alt="Sporten blijft slecht voor je" width="100" height="100">
                         <span class="video"></span>
                         <div class="details">
                             <h1>'.$headlines[$x].'</h1>
                             <date>'.$date[$x].'</date>
                             <p class="stats">'.$stats[$x].'</p>
                             <p class="description">'.$desc[$x].'</p>
                         </div>
                     </a>';
//                echo '<a id="'.$x.'" class="linkbtn" href="#">' .$headlines[$x] . "</a><br>";
                    echo '<p class="hidden" id="link'.$x.'">'.$embed[$x].'</p>';
                    echo '<p class="hidden" id="info'.$x.'">'.$links[$x].'</p>';
                }else{
                    echo '<a id="'.$x.'" href="#" class="dumpthumb linkbtn" title="'.$headlines[$x].'">
                         <img src="thumbs/'.$imgname[$x].'" alt="Sporten blijft slecht voor je" width="100" height="100">
                         <span id="thumb'.$x.'" class="foto"></span>
                         <div class="details">
                             <h1>'.$headlines[$x].'</h1>
                             <date>'.$date[$x].'</date>
                             <p class="stats">'.$stats[$x].'</p>
                             <p class="description">'.$desc[$x].'</p>
                         </div>
                     </a>';
//                echo '<a id="'.$x.'" class="linkbtn" href="#">' .$headlines[$x] . "</a><br>";
                    echo '<p class="hidden" id="link'.$x.'">'.$embed[$x].'</p>';
                    echo '<p class="hidden" id="info'.$x.'">'.$links[$x].'</p>';
                }
            }

        }
    }else{
        echo 'er is een probleem met je internet<br><button value="Refresh Page" onClick="window.location.reload();">Refresh page</button>';
    }

?>

