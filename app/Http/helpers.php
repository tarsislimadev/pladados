<?php

function map_script($map, $script) {
    $interpolations = ['name', 'id', 'zoom', 'latitude', 'longitude'];

    foreach ($interpolations as $interpolation) {
        $script = \str_replace('#' . $interpolation . '#', $map->{$interpolation}, $script);
    }

    return $script;
}
