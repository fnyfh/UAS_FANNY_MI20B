<?php
include '../controller/Auth.php';
$ctrl = new Auth();
//mengaktifkan session
session_start();
$code = $ctrl->acakCaptcha();
$_SESSION["code"] = $code;

$wh = imagecreatetruecolor(173, 50);

$bgc = imagecolorallocate($wh, 22, 86, 165);

$fc = imagecolorallocate($wh, 223, 230, 233);
imagefill($wh, 0, 0, $bgc);

imagestring($wh, 10, 50, 15, $code, $fc);
 
header("Content-type: image/jpg");
imagejpeg($wh); 
imagedestroy($wh);
?>