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
        return !empty($_SERVER['HTTPS']) ? secure_asset($path) : url($path);
    }
}


