<?php
session_start();
session_register('code');
$_SESSION['code'] = rand(1000000,9999999);
for($i = 0; $i < 7; $i++) {
    $arr[$i] = substr($_SESSION['code'],$i,1);
}
$im = imagecreate(230,140);
imagecolorallocate($im,255,255,255);
$a = 0;
for($i = 0; $i < 7;$i++)
{
    $color=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
    imagestring($im,3,$a+=15,0,$arr[$i],$color);
}
header("Content-type: image/jpeg");
imagejpeg($im,'',400);
?>