<?php

namespace App\Utils;

class Str {

    public static function encode($str) {
        return \base64_encode($str);
    }

    public static function decode($str) {
        return \base64_decode($str);
    }

}
