<?php
include("simple_html_dom.php");
ini_set('max_execution_time', 300); //300 seconds = 5 minuten

$site = $_POST['site'];
$fotos = array();

$ch=curl_init();
curl_setopt($ch, CURLOPT_URL,$site);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_COOKIE, "nsfw=1");
$query = curl_exec($ch);
curl_close($ch);

$html = new simple_html_dom();
$html->load($query);

foreach($html->find('img[class=player]') as $link){
    $fotos[] = $link->src;
}

for($a = 0; $a < sizeof($fotos); $a++){
    $foto = explode('/',$fotos[$a]);
    $path = 'fotos/'.$foto[4];
    if (!@getimagesize($path)) {
        $content = file_get_contents($fotos[$a]);
        file_put_contents($path, $content);
    }
    if(sizeof($fotos) > 1){
        $nummer = $a + 1;
//        echo '<a src="'.$path.'"><img src="'.$path.'"></a>';
        echo '<a href="'.$path.'" title="Nummer '.$nummer.'"><img src="'.$path.'" alt="Nummer '.$nummer.'" class="imglist"/></a>';
    }

}

if(sizeof($fotos) > 1){
    echo "<script>
            $('#piclink').hide();
            $('.picplaylist').show();    
        </script>";
}else{
    echo $path;
}

?>

