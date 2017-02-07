<?php if(isset($_SESSION['id'])) {
    $user = getUser();
    keepAlive($user['user_id']);
    $count = new Database();
    $count->table = 'messages'; $count->pole="to_id";$count->id=$user['user_id'];$count->pole2="seen";$count->id2 = 0;$count->data = false;
    $msg_c = $count->get_table_by_double_statement();
    $count->table = 'users';
    $users_c = $count->get_table();
    $count->table = 'notifications';
    $count->pole="user_id";
    $not_c = $count->get_table_by_double_statement();

    $team = new Database();
    $team -> table = 'team_members';
    $team -> pole = 'user_id';
    $team -> data = true;
    $team -> id = $_SESSION['id'];
    $res = $team -> get_table_by_id();
    if(isset($res['member_id'])){
        $in_team = TRUE;
        $team -> table = 'teams';
        $team -> pole = 'team_id';
        $team -> id = $res['team_id'];
        $team_data = $team -> get_table_by_id();
    }else{
        $in_team = FALSE;
    }


} ?>
<div id="wrapper" class="">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="challenge-link trans navbar-brand bold-700 l-s fs-1.5em"><i class="icon-aceliga-grey challenge-text"></i><span class="challenge-text">ACE</span>LEAGUE</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="active" class="nav navbar-nav side-nav">
                    <li class="canvas-padding">
                    <?php if(!isset($_SESSION['id'])): ?>
                        <span class="white-text">
                        <span class="bold-700 uppercase">Dołącz do nas</span> i ciesz się rozgrywką na najwyższym poziomie!
                        </span><hr />
                        <a href="/signup" class="btn btn-challenge btn-register btn-navbar">DOŁĄCZ DO NAS</a>
                        <button type="button" class="btn btn-mute btn-outline btn-navbar" data-toggle="modal" data-target="#loginBox">ZALOGUJ SIĘ</button>
                    <?php else: ?>
                        <div class="container hidden-xs">
                            <div class="col-md-5">
                                <img src="<?= $user['profile_picture']; ?>" class='img-responsive' height="64" width="64" />
                            </div>
                            <div class="col-md-7 white-text">
                               <span class="bold-700 fs-1em"><?= $user['username']; ?></span><br />
                               <span><i class="icon-aceliga-grey text-ace fs-1hem"></i><b class="fs-10pt">{POINTS}</b></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    </li>
                    <?php if(isset($_SESSION['id'])): ?>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle uppercase" data-toggle="dropdown">Moja drużyna <span class="pull-right"><i class="caret"></i></span></a>
                      <ul class="dropdown-menu" role="menu" style="margin-bottom: 1em;">
                      <?php if($in_team == false): ?>
                        <li class="dropdown-header"><strong>Nie jesteś członkiem żadnej drużyny. Załóż swoją bądź poproś o dołączenie do istniejącej.</strong></li>
                        <li class="text-center">
                            <button type="button" class="btn btn-challenge btn-outline btn-navbar" data-toggle="modal" data-target="#teamBox">Załóż drużynę</button>
                        </li>
                  <?php else: ?>
                        <div class="container hidden-xs white-text">
                            <div class="col-md-12">
                                <strong><a href="/team/<?= $team_data['team_id'] ?>/<?= $team_data['team_name'] ?>/" class="challenge-link challenge-link-white"><?= $team_data['team_name'] ?></a></strong>
                            </div>
                            <div class="col-md-12">
                                <?= date("d.m.Y H:i:s",$team_data['created_at']) ?>
                            </div>
                        </div>
                  <?php endif; ?>

                                        </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle uppercase" data-toggle="dropdown">Moje turnieje <span class="pull-right"><i class="caret"></i></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header">Dropdown heading</li>
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                      </ul>
                    </li>
                    <?php endif; ?>
                    <div class="sidebar__footer text-center col-md-6 col-md-offset-3">
                    <i class="icon-aceliga-grey fs-2em"></i><br />
                    <?php if(isset($_SESSION['id'])): ?>
                        <a class="challenge-link ultra-bold-900 uppercase" href="/logout">Wyloguj</a>
                    <?php endif; ?>
                    Wygenerowano w <?= round($_SERVER['REQUEST_TIME_FLOAT'] - $_SERVER['REQUEST_TIME'],2) ?>s
                    </div>
<!--                     <li class=""><a href="#"><i class="fa fa-bullseye"></i> Dashboard</a></li>
                    <li><a href="#"><i class="fa fa-tasks"></i> Portfolio</a></li>
                    <li><a href="#"><i class="fa fa-globe"></i> Blog</a></li>
                    <li><a href="#"><i class="fa fa-list-ol"></i> SignUp</a></li>

                    <li><a href="timeline.html"><i class="fa fa-font"></i> Timeline</a></li>
                    <li><a href="forms.html"><i class="fa fa-list-ol"></i> Forms</a></li>
                    <li><a href="typography.html"><i class="fa fa-font"></i> Typography</a></li>
                    <li><a href="bootstrap-elements.html"><i class="fa fa-list-ul"></i> Bootstrap Elements</a></li>
                    <li><a href="bootstrap-grid.html"><i class="fa fa-table"></i> Bootstrap Grid</a></li> -->

                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user" data-wow-duration="">
                <?php if(isset($_SESSION['id'])): ?>
                    <li class="user-dropdown">
                        <a href="/players/<?= $user['username']; ?>" class="bold-700 <?php if(isset($_GET['nickname']) AND $_GET['nickname'] == $_SESSION['username']) set_active_top('player') ;?>"><img src="<?= $user['profile_picture']; ?>" height="16" width="16" /> <?= $user['username']; ?></a>
<!--                         <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="/logout"><i class="fa fa-power-off"></i> Log Out</a></li>

                        </ul> -->
                    </li>                    <li class="divider-vertical"></li>
                    <li class="dropdown messages-dropdown">
                        <a href="/messages" class="<?php if($msg_c > 0) echo 'challenge-link-blue'; ?>"><i class="fa fa-fw fa-envelope top-icon" ></i><?php if($msg_c > 0): ?><span class="badge not-badge"><?= $msg_c ?></span><?php endif; ?></a>
                    </li>
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="clearNots();" id="notcount"><i class="fa fa-fw fa-globe top-icon" ></i><span id="notify" class="not-badge"></span></a>
                        <ul class="dropdown-menu dropdown-menu-top" id="notify_bar">

                        </ul>
                    </li>
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="reqcount"><i class="fa fa-fw fa-user top-icon" ></i><span id="req" class="not-badge"></span></a>
                        <ul class="dropdown-menu dropdown-menu-top">
                            <li class="dropdown-header">2 New Messages</li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Security alert</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Security alert</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Go to Inbox <span class="badge">2</span></a></li>
                        </ul>
                    </li>
                    <li>
                    <a href="/settings" class="<?php set_active_top('settings') ;?>"><b class="fa fa-fw fa-cog hidden-xs top-icon"></b><b class="visible-xs-block">Ustawienia</b></a>
                    </li>
                    <li>
                    <a href="/logout" class=""><b class="fa fa-fw fa-sign-out hidden-xs top-icon"></b><b class="visible-xs-block">Wyloguj</b></a>
                    </li>

                <?php else: ?>
                <li><a href="/signup" class="btn btn-challenge btn-register btn-navbar">DOŁĄCZ DO NAS</a></li>
                <li><button type="button" class="btn btn-mute btn-outline btn-navbar" data-toggle="modal" data-target="#loginBox">ZALOGUJ SIĘ</button></li>
                <?php endif; ?>
                </ul>
            </div>
        </nav>