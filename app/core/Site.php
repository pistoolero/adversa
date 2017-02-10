<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-02-07
 * Time: 14:43
 */
class Site
{
    public static $db_host, $db_name, $db_user, $db_pass;
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
    public static function Session() : bool{
        if(isset($_SESSION['id'])){
            return true;
        }else{
            return false;
        }
    }
    public static function GRS(int $length = 32,bool $special = false) :string {
        if($special == false){
            $characters = 'qwertyuiopasdfghjklzxcvbnm01234567890QWERTYUIOPASDFGHJKLZXCVBNM';
        }elseif($special == true){
            $characters = 'qwertyuiopasdfghjklzxcvbnm01234567890QWERTYUIOPASDFGHJKLZXCVBNM!@#$%^&*';
        }

        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public static function set_error($error){

        setcookie("error",$error,time()+1,"/");

    }
    public static function set_success($success){
        setcookie("success",$success,time()+1,"/");
    }
    public static function redirect(string $type,$number,$location="/"){
        if($type == 'error'){
            self::set_error($number);
            header("Location: ".$location);
            exit;
        }else if($type=='success'){
            self::set_success($number);
            header("Location: ".$location);
            exit;
        }
    }
    public static function errorControl(){
        self::load(CORE_PATH.'error_control');
    }

}