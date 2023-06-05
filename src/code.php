<?php
require_once "vendor/autoload.php";

// sample
// https://blog.capilano-fw.com/?p=727

$array = ['key' => 'value'];
$collection = collect($array);
var_dump($collection);