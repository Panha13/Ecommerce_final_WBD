<?php 

$img_val = floor(microtime(true) * 1000) . "." . $ext;
$sourceProperties = getimagesize($tmp_name);
$width = $sourceProperties[0];
$height = $sourceProperties[1];
$imageType = $sourceProperties[2];
