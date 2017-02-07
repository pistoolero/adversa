<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016-12-15
 * Time: 21:19
 */

include_once CONFIG_PATH.'config.php';

class Database
{
    protected $host, $dbname, $user, $pass, $db,$table,$order,$data,$query;

    public function __construct($host, $dbname , $user , $pass )
    {
        $this->host=$host;
        $this->dbname=$dbname;
        $this->user=$user;
        $this->pass=$pass;
        try
        {

            $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->db -> exec("set names utf8");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function getTable(string $table,array $order = [0,"","ASC"],bool $data = TRUE){
        $this->table = $table;
        $this->order[] = $order;
        $this->data = $data;
        if($this->order[0] === 0)
        {
            $query = 'SELECT * FROM ?';
            $exec = $this->db->Prepare($query);
            $exec->bindValue(1,$this->table,PDO::PARAM_STR);
            $exec->Execute();
            $result = $exec->fetchAll(PDO::FETCH_ASSOC);
            $count = $exec-> rowCount();
                if($this->data === TRUE){
                    return $result;
                }else{
                    return $count;
                }
        }elseif($this->order[0] === 1)
        {
            $query = 'SELECT * FROM ? ORDER BY ? ? ';
            $exec = $this->db->Prepare($query);
            $exec->bindValue(1,$this->table,PDO::PARAM_STR);
            $exec->bindValue(2,$this->order[1],PDO::PARAM_STR);
            $exec->bindValue(3,$this->order[2],PDO::PARAM_STR);
            $exec->Execute();
            $result = $exec->fetchAll(PDO::FETCH_ASSOC);
            $count = $exec-> rowCount();
            if($this->data === TRUE){
                return $result;
            }else{
                return $count;
            }
        }
    }

    public function customQuery(string $query,string $type,bool $multi = false, array $params = []){
        $this->query = $query;
        $exec = $this->db->Prepare($this->query);
        foreach ($params as $index => $param){
            $exec->bindValue($index,$param[0],$param[1]);
        }
        $exec->Execute();
        switch ($type){
            case "SELECT":
                if($multi){
                    $result = $exec->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $exec -> fetch(PDO::FETCH_ASSOC);
                }
                break;

            case "INSERT":
                $result = $this->db->lastInsertId();
                break;

            default:
                $result = NULL;
                break;

        }

        return $result;
    }

}