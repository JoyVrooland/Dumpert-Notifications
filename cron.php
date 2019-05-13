<?php
$files = glob('fotos/*.jpg');
foreach($files as $file) {
    unlink($file);
}