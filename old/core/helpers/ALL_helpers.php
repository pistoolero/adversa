<?php
$files_array = scandir(__DIR__);
$files_array = array_diff($files_array, ['.','..','ALL_helpers.php']);

foreach ($files_array as $file) {
	require_once $file;
}
