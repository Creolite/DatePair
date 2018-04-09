<?php
/* Custom helper functions */

/* Adds 's' to a word if more than one item */
if (! function_exists('_s')) {
    function _s($count){
        return $count > 1 ? 's' : '';
    }
}

/*
 * Loads assets (css, js) with protocol 'http://' on localhost and 'https://' anywhere else
 * Assumes <anywhere else> domain is SSL/TLS secured/encrypted
 */
if (! function_exists('_asset')) {
    function _asset($path){
        $url = env('APP_URL');
        $local = stristr($url, 'localhost') or stristr($url, '127.0.');
        return $local ? url($path) : secure_asset($path);
    }
}

/*
 * Convert Array collection to Object
 *
 * For typically one-dimensional array collection like Database rows, '$depth = 1' makes a sensible default
 * If @param $depth exceeds the actual array dimension, the output is still not affected
 * E.g @param $array: [ ['id' => '1', 'name' => 'aaa'], ['id' => '2', 'name' => 'bbb'] ];
 *
 * Alternative implementation:
 * {
 *      $object = json_decode(json_encode($array));
 *      return $object;
 * }
 * Caveat:
 *      "json_decode on different environments converts UTF-8 data in different ways"
 *      See: https://stackoverflow.com/questions/1869091/how-to-convert-an-array-to-object-in-php
 */
if (! function_exists('_object')) {
    function _object(Array $array, $depth = 1){
        $object = new stdClass();
        foreach ($array as $key => $value){
            $object->{strtolower($key)} = (is_array($value)) ? _object($value, $depth - 1) : $value;
        }
        return $object;
    }
}

// Others: https://stackoverflow.com/questions/1869091/how-to-convert-an-array-to-object-in-php

// 1.) Check for use in Comm-Rev app
/*class Person {

    private $name;
    private $age;
    private $sexe;

    function __construct ($payload)
    {
        if (is_array($payload))
            $this->from_array($payload);
    }


    public function from_array($array)
    {
        foreach(get_object_vars($this) as $attrName => $attrValue)
            $this->{$attrName} = $array[$attrName];
    }

    public function say_hi ()
    {
        print "hi my name is {$this->name}";
    }
}

print_r($_POST);
$mike = new Person($_POST);
$mike->say_hi();*/
