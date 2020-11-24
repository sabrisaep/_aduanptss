<?php

if (!function_exists('kodsulit')) {
    function kodsulit()
    {
        $huruf = 'ACDEFGHJKLMNPQRTUVWXY';
        $kata = substr(str_shuffle($huruf),0,6);

        # add space between char using looping

        $trgt_layer = imagecreatetruecolor(72, 28);
        $captcha_bg = imagecolorallocate($trgt_layer, 0, 0, 150);
        imagefill($trgt_layer, 0, 0, $captcha_bg);
        $captcha_txtclr = imagecolorallocate($trgt_layer, 255, 255, 255);
        imagestring($trgt_layer, 5, 10, 5, $kata, $captcha_txtclr);
        header("Content-type: image/jpeg");
        imagejpeg($trgt_layer);

        # https://phppot.com/php/php-captcha/
    }
}
