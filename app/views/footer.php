<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-02-07
 * Time: 15:16
 */

?>
<?php if(!Site::Session()): ?>
    <!-- Login Box -->
    <div class="modal" id="loginBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog ezCustTrans" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title uppercase text-center" id="myModalLabel">Logowanie</h4>
                </div>
                <div class="modal-body center-block">
                    <div id="loginBoxContent" class="">
                        <form method="POST" id="login-form" action="">
                            <div id="add_err"></div>

                            <div class="form-group label-floating">
                                <label for="username" class="control-label">Login</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group label-floating">
                                <label for="password" class="control-label">Hasło</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="button" id="login" class="btn btn-common mt-50 btn-block" name="login">Zaloguj</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer login-footer" id="changer">
                    <span class="text-left">Nie masz konta? <a data-toggle="modal" data-target="#registerBox" class="fake-link" id="to_register">Zarejestruj się!</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Box -->
    <div class="modal" id="registerBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog ezCustTrans" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title uppercase text-center" id="myModalLabel2">Rejestracja</h4>
                </div>
                <div class="modal-body center-block">
                    <div id="registerBoxContent" class="">
                        <form method="POST" id="register-form" action="">
                            <div id="add_err2"></div>
                            <div id="check_username"></div>
                            <div id="check_mail"></div>
                            <div class="form-group label-floating">
                                <label for="username" class="control-label">Login</label>
                                <input type="text" class="form-control" id="username_r" name="username">
                            </div>
                            <div class="form-group label-floating">
                                <label for="mail" class="control-label">Adres e-mail</label>
                                <input type="email" class="form-control" id="mail" name="mail">
                            </div>
                            <div class="form-group label-floating">
                                <label for="password" class="control-label">Hasło</label>
                                <input type="password" class="form-control" id="password_r" name="password">
                            </div>
                            <div class="form-group label-floating">
                                <label for="repeat_password" class="control-label">Powtórz hasło</label>
                                <input type="password" class="form-control" id="repeat_password" name="repeat_password">
                            </div>

                            <button type="button" id="register" class="btn btn-common mt-50 btn-block" name="register">Zarejestruj</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer login-footer" id="changer">
                    <span class="text-left">Masz już konto? <a data-toggle="modal" data-target="#loginBox" class="fake-link" id="to_login">Zaloguj się!</a></span>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
Site::load(VIEWS_PATH.'footer_scripts');

?>