<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-02-08
 * Time: 14:20
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/app/config/config.php';

class User extends Database
{
    public function __construct()
    {
        $host = $_ENV['db_host'];
        $dbname = $_ENV['db_name'];
        $user = $_ENV['db_user'];
        $pass = $_ENV['db_pass'];
        parent::__construct($host, $dbname, $user, $pass);
    }

    public function userData($username){
       $result = $this->customQuery("SELECT * FROM users WHERE username = ?","SELECT",[[$username,PDO::PARAM_STR]]);
       return $result;
    }
    public function register(string $username,string $password,string $mail){
        $time = time();
        $group_id = 1;
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $active_code = Site::GRS(32,false);
        $this->customQuery("INSERT INTO users(username,password,mail,active,register,group_id) VALUES(?,?,?,?,?,?)","insert",[[$username,PDO::PARAM_STR],[$password_hash,PDO::PARAM_STR],[$mail,PDO::PARAM_STR],[$active_code,2],[$time,1],[$group_id,1]],false);
        $this->activationMail($username,$active_code,$mail);
    }
    private function activationMail($username,$active_code,$mail){
        $to = $mail;
        $subject = "Rejestracja na stronie ".$_SERVER['HTTP_HOST'].".";
        $headers = "From: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n";
        $headers .= "Reply-To: noreply@". $_SERVER['HTTP_HOST'] . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $content = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/mail_templates/register_mail.html');
        $content = str_replace("{SITE_ADDRESS}",$_SERVER['HTTP_HOST'],$content);
        $content = str_replace("{USERNAME}",$username,$content);
        $content = str_replace("{ACTIVE_TOKEN}",$active_code,$content);
        mail($to,$subject,$content,$headers);
    }
    public function checkMail($mail){
        $result = $this->customQuery("SELECT mail FROM users WHERE mail = ?","SELECT",[[$mail,PDO::PARAM_STR]]);
        if(! $result['mail']) {
            $result['mail'] = "";
        }

        return $result;
    }
    public function checkUsername($username){
        $result = $this->customQuery("SELECT username FROM users WHERE username = ?","SELECT",[[$username,PDO::PARAM_STR]]);
        if(! $result['username']) {
            $result['username'] = "";
        }

        return $result;
    }
    public function getUserGroup($username) : array {
        $user = $this->userData($username);
        $result = $this->customQuery("SELECT * FROM groups WHERE id = ?","SELECT",[[$user['group_id'],1]]);

        return $result;
    }
    public function checkAdmin($username) : bool{
        $admin = $this->getUserGroup($username);
        if($admin['is_superadmin']){
            return true;
        }else{
            return false;
        }
    }
}