<?php
require_once "vendor/autoload.php";

$array = ['key' => 'value'];
$collection = collect($array);
var_dump($collection);