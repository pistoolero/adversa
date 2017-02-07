<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016-12-15
 * Time: 21:16
 */
$files_array = scandir(__DIR__);
$files_array = array_diff($files_array, ['.','..','ALL_helpers.php']);

foreach ($files_array as $file) {
    require_once $file;
}
