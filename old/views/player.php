<?php
$var = new User();
$var -> username = $_GET['nickname'];
$data = $var -> player_profile();
if(!$data){
	redirect('error',39);
}
$var -> group = $data['group_id'];
$group = $var -> get_user_group();
	$steamid = new Database();
	$steamid -> table = 'steam_accounts';
	$steamid -> pole = 'user_id';
	$steamid -> id = $data['user_id'];
	$steamid = $steamid -> get_table_by_id();
	if($steamid)
	$steamid = $steamid['steamid64'];
	else
		$steamid = NULL;
	if($steamid != NULL){
}


if(isset($_SESSION['id'])){
global $logged;
$logged = TRUE;
if($_SESSION['username'] == $_GET['nickname']){
	$own_profile = TRUE;
}else{
	$own_profile = FALSE;
}
$var -> id = $_SESSION['id'];
$var -> id2 = $data['user_id'];
$friendship = $var -> check_friendship();

}else{
	$own_profile = FALSE;
	$logged = FALSE;
}
?>
<div class="row">
	<div class="col-lg-12">
		<h5><?= $data['username'] ?> <small>(<?= $group['group_name'] ?>)</small></h5>
	</div>

	<?php if($steamid != NULL): ?>
<?php endif; ?>
	<?php if(!$own_profile && $logged): ?>
		<?php if(!$friendship): ?>
			<a href="/core/friendship.php?friend=<?= $data['user_id'] ?>&player=<?= $_SESSION['id'] ?>&action=add&sname=<?= $_SESSION['username'] ?>&fname=<?= $_GET['nickname']; ?>" class="btn btn-primary">
				<i class='fa fa-fw fa-user-plus'></i> Dodaj do znajomych
			</a>
		<?php elseif($friendship['status'] == "pending"): ?>
			<button class="btn btn-default" disabled="disabled">
				<i class='fa fa-fw fa-clock-o'></i> Oczekiwanie na akceptacje
			</button>
		<?php elseif($friendship['status'] == "accepted"): ?>
			<button class="btn btn-danger">
				<i class='fa fa-fw fa-user-times'></i> Usuń ze znajomych
			</button>
		<?php endif; ?>
	<?php endif; ?>
</div>