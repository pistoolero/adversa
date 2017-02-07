<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-02-07
 * Time: 15:03
 */
echo "<head>".PHP_EOL;
echo '<title>';
echo Site::Title();
echo'</title>';
Site::load(VIEWS_PATH.'css');
Site::load(VIEWS_PATH.'meta');
Site::load(VIEWS_PATH.'header_scripts');
echo "</head>".PHP_EOL;
