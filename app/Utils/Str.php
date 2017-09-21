<?php

class Str {

    public function encode($str) {
        return \base64_encode($str);
    }

    public function decode($str) {
        return \base64_decode($str);
    }

}
