<?php
include("simple_html_dom.php");
ini_set('max_execution_time', 300); //300 seconds = 5 minuten

$filter = $_POST['filter'];
$nsfw = $_POST['nsfw'];

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

$site = 'https://www.dumpert.nl/search/ALL/'. $filter.'/';


$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $site);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_COOKIE, "nsfw=".$nsfw);

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

if(sizeof($headlines) > 0) {

    for ($y = 0; $y < sizeof($images); $y++) {
        $picturename = $images[$y];
        $picturename = parse_url($picturename);
        $picturename = $picturename['path'];
        $picturename = explode('/', $picturename);
        $imgname[] = $picturename[2];
    }
    for($a = 0; $a < sizeof($images); $a++){
        $content = file_get_contents($images[$a]);
        $path = 'thumbs/'.$imgname[$a];
        if (!@getimagesize($path)) {
            file_put_contents($path, $content);
        }


    }

    for ($x = 0; $x < sizeof($links); $x++) {
        if ($dumbtype[$x] == 'video') {
            echo '<a id="' . $x . '" href="#" class="dumpthumb linkbtn" title="' . $headlines[$x] . '">
                         <img src="thumbs/' . $imgname[$x] . '" alt="Sporten blijft slecht voor je" onerror="if (this.src != \'error.png\') this.src = \'error.png\';" width="100" height="100">
                         <span class="video"></span>
                         <div class="details">
                             <h1>' . $headlines[$x] . '</h1>
                             <date>' . $date[$x] . '</date>
                             <p class="stats">' . $stats[$x] . '</p>
                             <p class="description">' . $desc[$x] . '</p>
                         </div>
                     </a>';
//                echo '<a id="'.$x.'" class="linkbtn" href="#">' .$headlines[$x] . "</a><br>";
            echo '<p class="hidden" id="link' . $x . '">' . $embed[$x] . '</p>';
            echo '<p class="hidden" id="info' . $x . '">' . $links[$x] . '</p>';
        } else {
            echo '<a id="' . $x . '" href="#" class="dumpthumb linkbtn" title="' . $headlines[$x] . '">
                         <img src="thumbs/' . $imgname[$x] . '" alt="Sporten blijft slecht voor je" onerror="if (this.src != \'error.png\') this.src = \'error.png\';" width="100" height="100">
                         <span id="thumb' . $x . '" class="foto"></span>
                         <div class="details">
                             <h1>' . $headlines[$x] . '</h1>
                             <date>' . $date[$x] . '</date>
                             <p class="stats">' . $stats[$x] . '</p>
                             <p class="description">' . $desc[$x] . '</p>
                         </div>
                     </a>';
//                echo '<a id="'.$x.'" class="linkbtn" href="#">' .$headlines[$x] . "</a><br>";
            echo '<p class="hidden" id="link' . $x . '">' . $embed[$x] . '</p>';
            echo '<p class="hidden" id="info' . $x . '">' . $links[$x] . '</p>';
        }
    }

}

?>

