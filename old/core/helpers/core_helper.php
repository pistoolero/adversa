<?php

require __DIR__."/../database.php";
// require __DIR__.'/../app/aws/aws-autoloader.php';
    require __DIR__."/../steamauth/steamauth.php";
    require __DIR__ . '/../SourceQuery/bootstrap.php';
//     require __DIR__ . '/../SMA/api/AuthFunctions.php';
//     require __DIR__ . '/../steamlogin/main.php';
//     require_once __DIR__.'/../steamtrade/classes/steam.class.php';
//     $SteamAuth = new SteamAuth;

// $twofactorcode = $SteamAuth->GenerateSteamGuardCode("g94Cd6NiCAyTQnjFzrHnhJ1Ny9c=");

class Encryption
{
		public $string;

	    public function encrypt(){
	        $iv = mcrypt_create_iv(
	            mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
	            MCRYPT_DEV_URANDOM
	        );
	        $encrypt = base64_encode(
	            $iv .
	            mcrypt_encrypt(
	                MCRYPT_RIJNDAEL_128,
	                hash('sha256', SHAKey, true),
	                $this->string,
	                MCRYPT_MODE_CBC,
	                $iv
	            )
	        );

	        return $encrypt;
	    }
	    public function decrypt(){
	        $data = base64_decode($this->string);
	        $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

	        $decrypted = rtrim(
	            mcrypt_decrypt(
	                MCRYPT_RIJNDAEL_128,
	                hash('sha256', SHAKey, true),
	                substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
	                MCRYPT_MODE_CBC,
	                $iv
	            ),
	            "\0"
	        );
	        return $decrypted;
	    }
}

class Databases
{

    protected $host = "localhost";
    protected $dbname = "ace";
    protected $user = "root";
    protected $pass = "";
    protected $db;

	public $table;
	public $data = true;
	public $order = [0,"","ASC"];
	public $what;
	public $id;
	public $pole = 'id';
	public $statement = "=";
	public $logic = "AND";
	public $statement2 = "=";
	public $pole2 = 'id';
	public $id2;
	public $username;
	public $teamname;
	public $tag;
	public $user_id;
	public $multi = false;
	  function __construct() {


        try {

            $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->db -> exec("set names utf8");
        }
        catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

	public function get_table()
	{
		if($this->order[0] == 0) {
        $query = "SELECT * FROM ".$this->table;
        $guser = $this->db->Prepare($query);
        $guser->Execute();
        $fuser = $guser->fetchAll(PDO::FETCH_ASSOC);
        $count = $guser -> rowCount();
	        if($this->data == true){
	            return $fuser;
	        }else{
	            return $count;
	        }
	    }elseif($this->order[0] == 1) {
	        $query = "SELECT * FROM " . $table." ORDER BY ".$order[1]." ".$order[2];
	        $guser = $this->db->Prepare($query);
	        $guser->Execute();
	        $fuser = $guser->fetchAll(PDO::FETCH_ASSOC);
	        $count = $guser -> rowCount();
	        if($data == true){
	            return $fuser;
	        }else{
	            if($count == 0){
	                return 0;
	            }else{
	                return $count;
	            }
	        }
	    }
	    if($this->data == true){
	        return $fuser;
	    }else{
	        if($count == 0){
	            return 0;
	        }else{
	            return $count;
	        }
	    }
	}

	public function get_table_sum() {
    $query = 'SELECT SUM('.$this->what.') FROM '.$this->table;
    $guser = $this->db->Prepare($query);
    $guser -> Execute();
    $fuser = $guser -> fetchColumn();

    return $fuser;
}
	public function get_table_by_id_multi() {
	    $query = 'SELECT * FROM '.$this->table.' WHERE '.$this->pole.' = '.$this>id;
	    $guser = $this->db->Prepare($query);
	    $guser -> Execute();
	    $fuser = $guser -> fetchAll();

	    return $fuser;
	}
	public function get_table_by_id() {
	    $query = 'SELECT * FROM '.$this->table.' WHERE '.$this->pole.' = '.$this->id;
	    $guser = $this->db->Prepare($query);
	    $guser -> Execute();
	    $fuser = $guser -> fetch(PDO::FETCH_ASSOC);
	    $count = $guser -> rowCount();
	    if($this->data == true){
	        return $fuser;
	    }else{
	        return $count;
	    }

	}

	public function get_table_by_statement() {

	        $query = 'SELECT * FROM '.$this->table.' WHERE '.$this->pole.' '.$this->statement.' '.$this->id;
	        $guser = $this->db->Prepare($query);
	        $guser -> Execute();
	        $fuser = $guser -> fetch();
	        $count = $guser -> rowCount();
	        if($this->data == true){
	            return $fuser;
	        }else{
	            return $count;
	        }



	}
	public function get_table_by_double_statement() {

	        $query = 'SELECT * FROM '.$this->table.' WHERE '.$this->pole.' '.$this->statement.' "'.$this->id.'" '.$this->logic.' '.$this->pole2.' '.$this->statement2.' "'.$this->id2.'"';
	        $guser = $this->db->Prepare($query);
	        $guser -> Execute();
	        
	        
	        $count = $guser -> rowCount();
	        if($this->data == true){
	        	if($this->multi == false){
					$fuser = $guser -> fetch();
	        	}else{
	        		$fuser = $guser -> fetchAll();
	        	}
	            return $fuser;
	        }else{
	            return $count;
	        }



	}

	public function new_team(){
		$time = time();
		$query = "INSERT INTO teams(creator_id,captain_id,team_name,team_tag,created_at) VALUES(:creator,:captain,:teamname,:teamtag,:created_at)";
		$team = $this->db->Prepare($query);
		$team -> bindParam(":creator",$this->user_id,PDO::PARAM_INT);
		$team -> bindParam(":captain",$this->user_id,PDO::PARAM_INT);
		$team -> bindParam(":teamname",$this->teamname,PDO::PARAM_STR);
		$team -> bindParam(":teamtag",$this->tag,PDO::PARAM_STR);
		$team -> bindParam(":created_at",$time,PDO::PARAM_INT);
		$team -> Execute();
		$lastid = $this->db->lastInsertId();

		$query2 = "INSERT INTO team_members(team_id,user_id,join_date) VALUES(:teamid,:userid,:joindate)";
		$teamm = $this->db->Prepare($query2);
		$teamm -> bindParam(":teamid",$lastid,PDO::PARAM_INT);
		$teamm -> bindParam(":userid",$this->user_id,PDO::PARAM_INT);
		$teamm -> bindParam(":joindate",$time,PDO::PARAM_INT);
		$teamm -> Execute();
		return $query2;
	}

}

class Notifications extends Databases {
	public function clear_unseen(){
		$query = "UPDATE notifications SET seen = 1 WHERE user_id = :userid AND seen = 0";
		$stmt = $this->db->Prepare($query);
		$stmt -> bindParam(":userid",$this->user_id,PDO::PARAM_INT);
		$stmt -> Execute();
	}
	public function last10_not(){
		$query = "SELECT * FROM notifications WHERE user_id = :userid ORDER BY sent DESC LIMIT 10";
		$stmt = $this->db->Prepare($query);
		$stmt -> bindParam(":userid",$this->user_id,PDO::PARAM_INT);
		$stmt -> Execute();

		return $stmt -> fetchAll();
	}
	public $message;
	public function send_notify(){
		$time = time();
		$query2 = "INSERT INTO notifications(user_id,content,sent) VALUES(:userid,:content,:sent)";
		$stmt = $this->db->Prepare($query2);
		$stmt -> bindParam(":content",$this->message,PDO::PARAM_STR);
		$stmt -> bindParam(":userid",$this->user_id,PDO::PARAM_INT);
		$stmt -> bindParam(":sent",$time,PDO::PARAM_INT);
		$stmt -> Execute();
	}
}

class Users extends Databases {
	public $group = 1;

	public function get_user_group() {
	    $query = "SELECT * FROM groups WHERE group_id = :username";
	    $guser = $this->db->Prepare($query);
	    $guser -> bindParam(":username", $this->group, PDO::PARAM_INT);
	    $guser -> Execute();
	    $fuser = $guser -> fetch(PDO::FETCH_ASSOC);

	    return $fuser;
	}

	public function player_profile($type = 'username') {
		if($type == 'username') {
			$query = "SELECT * FROM users WHERE username = :username";
			$guser = $this->db->Prepare($query);
			$guser->bindParam(":username", $this->username, PDO::PARAM_STR);
			$guser->Execute();
		}elseif($type='userid'){
			$query = "SELECT * FROM users WHERE user_id = :username";
			$guser = $this->db->Prepare($query);
			$guser->bindParam(":username", $this->user_id, PDO::PARAM_INT);
			$guser->Execute();
		}
	    $fuser = $guser -> fetch(PDO::FETCH_ASSOC);

	    return $fuser;
	}

	public $status = "accepted";
	public function get_friends() {
	  
	  $query = 'SELECT * FROM friends WHERE user_id = :id OR friend_id = :id AND status = :status';
	    /** @var TYPE_NAME $db */
	    $guser = $this ->db->Prepare($query);
	    $guser -> bindParam(":id", $this->id, PDO::PARAM_INT);
	    $guser -> bindParam(":status", $this->status, PDO::PARAM_INT);
	    $guser -> Execute();
	    $fuser = $guser -> fetchAll();
	    $count = $guser -> rowCount();
	        if($this->data == true){
	        return $fuser;
	    }else{
	        return $count;
	    }
	}
	public function get_friendship_requests() {
		  $query = 'SELECT * FROM friends WHERE friend_id = :id AND status = :status';
	    /** @var TYPE_NAME $db */
	    $guser = $this ->db->Prepare($query);
	    $guser -> bindParam(":id", $this->id, PDO::PARAM_INT);
	    $guser -> bindParam(":status", $this->status, PDO::PARAM_INT);
	    $guser -> Execute();
	    $fuser = $guser -> fetchAll();
	    $count = $guser -> rowCount();
	        if($this->data == true){
	        return $fuser;
	    }else{
	        return $count;
	    }
	}

	public function check_friendship() {
		$query = 'SELECT * FROM friends WHERE user_id = :id AND friend_id = :id2 OR user_id = :id2 AND friend_id = :id';
	    $guser = $this ->db->Prepare($query);
	    $guser -> bindParam(":id", $this->id, PDO::PARAM_INT);
	    $guser -> bindParam(":id2", $this->id2, PDO::PARAM_INT);
	    $guser -> Execute();
	    $fuser = $guser -> fetch();
	        return $fuser;
	}

	public function send_friend_request(){
		$time = time();
		$query = 'INSERT INTO friends(user_id,friend_id,invite_date) VALUES(:uid,:fid,:time)';
	    $stmt = $this ->db->Prepare($query);
	    $stmt -> bindParam(":uid", $this->id, PDO::PARAM_INT);
	    $stmt -> bindParam(":fid", $this->id2, PDO::PARAM_INT);
	    $stmt -> bindParam(":time", $time, PDO::PARAM_INT);
	    $stmt -> Execute();

	}
	public function send_team_request(){
		$time = time();
		$query = 'INSERT INTO team_request(user_id,team_id,date) VALUES(:uid,:fid,:time)';
		$stmt = $this ->db->Prepare($query);
		$stmt -> bindParam(":uid", $this->id, PDO::PARAM_INT);
		$stmt -> bindParam(":fid", $this->id2, PDO::PARAM_INT);
		$stmt -> bindParam(":time", $time, PDO::PARAM_INT);
		$stmt -> Execute();
	}
}

