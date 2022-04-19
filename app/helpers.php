<?php

use Illuminate\Support\Str;

if(!function_exists('unique_product_id')){
    function unique_product_id($app_name, $version): string
    {
        sleep(1);
        return $app_name.'_'.$version.'_'.Str::random(6).time();
    }
}
