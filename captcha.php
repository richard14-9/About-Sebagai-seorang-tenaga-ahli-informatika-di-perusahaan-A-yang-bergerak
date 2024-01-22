<?php
session_start();

// Generate random string
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

// Generate captcha
$captcha = generateRandomString();
$_SESSION['captcha'] = base64_encode($captcha);

// Display captcha image
header('Content-Type: image/png');

$im = imagecreate(150, 50);
$bgColor = imagecolorallocate($im, 255, 255, 255);
$textColor = imagecolorallocate($im, 0, 0, 0);

imagestring($im, 5, 20, 15, $captcha, $textColor);
imagepng($im);
imagedestroy($im);
?>
