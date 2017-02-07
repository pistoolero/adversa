<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016-11-12
 * Time: 16:17
 */
session_start();
require_once("helpers/ALL_helpers.php");
$notifis = new Notification();
$notifis -> user_id = $_SESSION['id'];
$notifis = $notifis -> last10_not();
?>
<?php foreach($notifis as $notify): ?>
    <li class="message-preview">

                                    <span class="message noty-box"><?= $notify['content']; ?><br />
                                    <span class="noty-date"><?= time_ago($notify['sent']); ?></span>
                                    </span>

    </li>
    <li class="divider"></li>
<?php endforeach; ?>
<li class="text-center"><a href="#">Wyświetl wszystkie</a></li>