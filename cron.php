<?php
$files = glob('fotos/*.*');
foreach($files as $file) {
    unlink($file);
    
}