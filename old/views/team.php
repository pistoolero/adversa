<?php 
    $team = new Database();
    $team -> table = 'teams';
    $team -> pole = 'team_id';
    $team -> data = true;
    $team -> id = $_GET['id'];
    $res = $team -> get_table_by_id();
$request = new Database();
$request -> table = 'team_request';
$request -> pole = 'team_id';
$request -> id = $_GET['id'];
$request -> pole2 = 'user_id';
$request -> id2 = $_SESSION['id'];
$request = $request -> get_table_by_double_statement();

    if(!$res){
    	redirect('error',39);
    }
    if(isset($_SESSION['id'])){
        if($_SESSION['id'] == $res['captain_id']){
            $captain = TRUE;
        }else{
            $captain = FALSE;
        }

        $logged = TRUE;
        $member = new Database();
        $member->table='team_mebmers';$member->id=$_SESSION['id'];$member->pole='user_id';$member->id2=$_GET['id'];$member->pole2="team_id";
        $member = $member->get_table_by_double_statement();
        if($member){
            $member = TRUE;
        }else{
            $member = FALSE;
        }
    }else{
        $logged = FALSE;
        $member = FALSE;
    }
echo "<pre>";
vd($captain);
echo "</pre>"
?>

<?php if(!$member && $logged && $in_team == FALSE && !$request): ?>
    <a href="/core/team_request.php?type=invite&user=<?= $_SESSION['id'] ?>&teamid=<?= $res['team_id'] ?>&captain=<?= $res['captain_id'] ?>" class="btn btn-default">Dołącz do nas</a>
<?php endif; ?>