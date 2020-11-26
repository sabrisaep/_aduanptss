<?php

if (!function_exists('kodsulit')) {
    function kodsulit()
    {
        $huruf = 'ACDEFGHJKLMNPQRTUVWXY';
        $kata = substr(str_shuffle($huruf), 0, 6);

        $session = session();
        $session->set(['kodsulit' => $kata]);
        $session->markAsFlashdata('kodsulit');

        # add space between char using looping
        $kumpul = '';
        for ($x = 0; $x < strlen($kata); $x++) {
            $kumpul .= $kata[$x] . ' ';
        }
        $kata = trim($kumpul);

        $trgt_layer = imagecreatetruecolor(118, 26);
        $captcha_bg = imagecolorallocate($trgt_layer, 0, 0, 150);
        imagefill($trgt_layer, 0, 0, $captcha_bg);
        $captcha_txtclr = imagecolorallocate($trgt_layer, 255, 255, 255);
        imagestring($trgt_layer, 5, 10, 5, $kata, $captcha_txtclr);
        header("Content-type: image/jpeg");
        imagejpeg($trgt_layer);

        # https://phppot.com/php/php-captcha/
    }
}
