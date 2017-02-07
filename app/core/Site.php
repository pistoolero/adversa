<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-02-07
 * Time: 14:43
 */
class Site
{
    public static function load($file){
        require_once $file.".php";

    }
    public static function stylesheet($file){
        $file = CSS.$file.'.css';
        echo "<link rel=\"stylesheet\" href=\"{$file}\">".PHP_EOL;
    }
    public static function javascript($file){
        $file = JS.$file.'.js';
        echo "<script src='{$file}' ></script>".PHP_EOL;
    }
    public static function image($src,$class,$alt='',$id=""){
        echo "<img src='{$src}' class='{$class}' alt='{$alt}' ";
        if($id!=""){
            echo "id='{$id}'";
        }
        echo " />";
    }

    public static function Title(){
        $base = $_SERVER['HTTP_HOST'];
        $addr = $base;
        if(isset($_GET['username'])){
            $addr = $_GET['username'].' - '.$base;
        }else if(isset($_GET['page'])){
            switch ($_GET['page']) {
                case 'messages':
                    $page = "Wiadomości";
                    break;
                case 'settings':
                    $page = "Ustawienia";
                    break;
                case 'login':
                    $page = "Logowanie";
                    break;
                case 'register':
                    $page = "Rejestracja";
                    break;
                case 'team':
                    $page = htmlentities($_GET['teamname']);
                    break;

                default:
                    $page = 'Błąd 404';
                    break;
            }
            $addr = $page.' - '.$base;
        }
        return $addr;
    }
}