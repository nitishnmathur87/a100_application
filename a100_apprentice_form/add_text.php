<?php

$brush = imagecreate(100, 100);
$brushtrans = imagecolorallocate($brush, 0, 0, 0);
imagecolortransparent($brush, $brushtrans);

for ($k=1; k<18; ++$k) {
    $color = imagecolorallocate($brush, 255, $k*15, 0);
    imagefilledellipse($brush, $k*5, $k*5, 5, 5, $color);
}

imagepng($brush);
imagedestropy($brush);