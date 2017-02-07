<?php 
if(check_privilage() == FALSE){
	redirect("error",13);
}else{

// // apSFcQIm9DAtlIlFuiAX+LBufjI=


	$steam = new Database();
	$steam -> table = 'steam_accounts';
	$steam -> pole = 'user_id';
	$steam -> id = $_SESSION['id'];
	$steam = $steam -> get_table_by_id();
if($steam){
     $acc = steam_acc($steam['steamid64']); //$acc = $acc['response']['players'][0];
     $avatar = $acc->response->players[0]->avatarfull;
}

	?>

<div class="row">
	<div class="col-lg-12">
	<h4 class="h4-responsive">Ustawienia konta <small id="test"><?= $user['username'] ?></small></h4>
   <div class="btn-pref btn-group btn-group-justified btn-group-lg nav-tabs" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a type="button" id="stars" class="btn btn-challenge" href="#tab1" data-toggle="tab"><span class="fa fa-fw fa-user" aria-hidden="true"></span>
                <div class="hidden-xs">Ustawienia ogólne</div>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="fa fa-fw fa-gamepad" aria-hidden="true"></span>
                <div class="hidden-xs">Połączenia</div>
            </a>
        </div>

        <div class="btn-group" role="group">
		    <a id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="icon-aceliga-grey" aria-hidden="true"></span>
		        <div class="hidden-xs">Subskrypcje</div>
		    </a>
        </div>
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <h3>This is tab 1</h3>
        </div>
        <div class="tab-pane fade in" id="tab2">
	        <div class="row">
	        	<div class="col-md-6  col-md-offset-3">
	        		<div class="col-md-2 col-xs-2" style="background: url('/assets/img/csgo_icon.jpg'); background-size: cover; background-repeat: no-repeat">
	        		<img src="/assets/img/csgo_icon.jpg" style="visibility: hidden;" height="190" />
	        		</div>
	        		<div class="col-md-10 col-xs-10" style="max-height: 190px;height: 190px; margin: 0;">
	        		<?php if(!$steam): ?>
	        		<a href="/views/loginsteam.php?login" class="btn btn-block btn-success bottomaligned"><i class="fa fa-fw fa-steam"></i> Połącz z kontem STEAM </a>
	        		<?php else: ?>
	        			<div class="container-fluid">
							<div class="col-md-2 col-lg-2 col-xs-3" style='background: url("<?= $avatar?>");background-size:contain;background-repeat: no-repeat;'>
							 <img src="<?= $avatar?>" style="visibility: hidden;" height="85" />
							</div>
							<div class="col-md-10 col-lg-10 col-xs-9">
							<img src="/assets/img/flags/<?= strtolower($acc->response->players[0]->loccountrycode) ?>.gif" />&nbsp;<strong><?= $acc->response->players[0]->personaname ?></strong>
							<a href="http://steamcommunity.com/profiles/<?= $acc->response->players[0]->steamid ?>" target="_blank" class="challenge-link"><i class="fa fa-fw fa-link"></i></a><br />
							<strong>Na STEAM od: </strong><?= date('d.m.Y',$acc->response->players[0]->timecreated) ?><br />
							<strong>STEAMID(64): </strong><?= $steam['steamid64'] ?><br />
							<strong>STEAMID: </strong><?= $steam['steamid'] ?><br />
							</div>
	        			</div>
	        		<div class="col-md-12 col-xs-12 col-lg-12 bg-success text-center white-text bottomaligned steam-text uppercase medium-500"><i class="fa fa-fw fa-check"></i> Twoje konto jest połączone </div>
	        		<?php endif; ?>
	        		</div>
	        	</div>
	          
	         </div>
        </div>
        <div class="tab-pane fade in" id="tab3">
          <h3>This is tab 3</h3>
        </div>

      </div>

    </div>
	</div>
</div>














<?php } ?>