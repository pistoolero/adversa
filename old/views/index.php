            <div class="row">
                <div class="col-lg-12">
                    <h1>Strona główna <small>placeholder</small></h1>
                </div>
            </div>
            <?php 
            $users = new Database();
            $users->table = 'users';
            $users->id = '1';
            $users->pole = 'user_id';

            ?>
<pre>
<?php (isset($_SESSION['id']))? print_r($_SESSION) : false ?> <br />
<?php print_r($notifis); ?>
</pre>
<?php
