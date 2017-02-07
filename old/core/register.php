<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016-03-24
 * Time: 12:15
 */
require "helpers/ALL_helpers.php";
echo "<pre>";
print_r($_POST);
echo "</pre>";
if(isset($_POST['register'])) {
    $username = $_POST['username-r'];
    $dbuser = checkUsername($username);
    $email = $_POST['email-r'];
    $profile = "/assets/img/def_av.png";
    $active = GRS(32);
    $date = time();
    $dbmail = checkMail($email);
    $pw = $_POST['password-r'];
    $pw2 = $_POST['password-r_confirmation'];

    setcookie('username', $username , time()+10, "/");
    setcookie('email', $email , time()+10, "/");
    setcookie('pw', $pw , time()+10, "/");
    setcookie('pw2', $pw2 , time()+10, "/");

    $correct = 1;
    $options = [
        'cost' => 11,
        'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    ];
        $name = NULL;
        $surname = NULL;
    if (strlen($_POST['g-recaptcha-response']) > 5) {
        if (strtolower($dbuser['username']) == strtolower($username)) {
            $correct = 0;
            redirect("error","2","/signup");

        }
        if (strtolower($dbmail['email']) == strtolower($email)) {
            $correct = 0;
            redirect("error","3","/signup");
        }
        $newpw = password_hash($pw, PASSWORD_BCRYPT, $options);
        if ($pw !== $pw2) {
            $correct = 0;
            redirect("error","11","/signup");
        }
        echo $newpw;
        if($correct === 1){
            try{
                $query = "INSERT INTO users(username,email,password,register,active,profile_picture) VALUES(:username,:email,:password,:register,:active,:profile_picture)";
                $add = $db -> Prepare($query);
                $add -> bindParam(":username",$username, PDO::PARAM_STR);
                $add -> bindParam(":email",$email, PDO::PARAM_STR);
                $add -> bindParam(":password",$newpw, PDO::PARAM_STR);
                $add -> bindParam(":register",$date, PDO::PARAM_INT);
                $add -> bindParam(":active",$active, PDO::PARAM_STR);
                $add -> bindParam(":profile_picture",$profile, PDO::PARAM_STR);
                $add -> Execute();
                redirect("success","0","/");

            }catch(PDOException $e){
                $e->getMessage();
            }
        }
    }else{
        $correct = 0;
        redirect("error","23","/signup");
    }
}