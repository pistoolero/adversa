<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-01-17
 * Time: 17:17
 */
class Team extends Database
{
    public function createTeam($creator,$captain,$teamname,$teamtag){
        $time = time();
        $query = $this->customQuery("INSERT INTO teams(creator_id,captain_id,team_name,team_tag,created_at) VALUES(?,?,?,?,?)",'INSERT',false,[[$creator,PDO::PARAM_INT],[$captain,PDO::PARAM_INT],[$teamname,PDO::PARAM_STR],[$teamtag,PDO::PARAM_STR],[$time,PDO::PARAM_INT]]);

        return $query;
    }
}