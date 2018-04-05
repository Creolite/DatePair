<?php
/* Custom helper functions */

/* Adds 's' to a word if more than one item */
if (! function_exists('_s')) {
    function _s($count){
        return $count > 1 ? 's' : '';
    }
}

if (! function_exists('_asset')) {
    function _asset($path){
        $url = env('APP_URL');
        $local = stristr($url, 'localhost') or stristr($url, '127.0.');
        return $local ? url($path) : secure_asset($path);
    }
}
