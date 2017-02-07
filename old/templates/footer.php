</div>
<?php if(!isset($_SESSION['id'])): ?>
<!-- Login Box -->
<div class="modal fade white-text" id="loginBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title white-text uppercase text-center" id="myModalLabel">Logowanie</h4>
      </div>
      <div class="modal-body center-block">
            <div id="loginBoxContent" class="">
               <form method="POST" id="login-form" action="">
				  <div id="add_err"></div>

				  <div class="form-group">
				    <label for="username" class="uppercase">Login</label>
				    <input type="text" class="form-control" id="username" placeholder="Login" name="username">
				  </div>
				  <div class="form-group">
				    <label for="password" class="uppercase">Hasło</label>
				    <input type="password" class="form-control" id="password" placeholder="Hasło" name="password">
				  </div>
				  <button type="button" id="login" class="btn btn-challenge btn-block uppercase bold-700 " name="login">Zaloguj</button>
			</form>
            </div>
      </div>
      <div class="modal-footer login-footer">
<!--         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<!-- Team Box -->
<div class="modal fade white-text" id="teamBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title white-text uppercase text-center" id="myModalLabel">Zakładanie drużyny</h4>
      </div>
      <div class="modal-body center-block">
            <div id="loginBoxContent" class="">
               <form method="POST" id="team-form" action="">
          <div id="error"></div>
          <div class="form-group">
            <label for="teamname" class="uppercase">Nazwa drużyny</label>
            <input type="text" class="form-control" id="teamname" placeholder="Nazwa drużyny" name="teamname">
          </div>
          <div class="form-group">
            <label for="tag" class="uppercase">Tag <small>(max 6 znaków) </small></label>
            <input type="text" class="form-control" id="tag" placeholder="Tag" name="tag">
          </div>
          <button type="button" id="create" class="btn btn-challenge btn-block uppercase bold-700 " name="login">Załóż</button>
      </form>
            </div>
      </div>
      <div class="modal-footer login-footer">
<!--         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<?php
    /*
     * Include footer scripts
     */
    include_once "footer_scripts.php";
?>
    </body>
</html>
