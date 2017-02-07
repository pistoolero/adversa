           <div class="col-md-6 col-md-offset-3">
           <p class="fs-2em uppercase">
			Dołącz do nas!
           </p>
          
            <form method="POST" action="/core/register.php" class="toggle-disabled">
                <div class="form-group">
                    <label for="username-r" class="uppercase">Nazwa użytkownika<span id="usercheck-result" style="margin-left: 2rem;"></span></label>
                    <input type="text" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>" class="form-control" id="username-r" name="username-r" placeholder="Nazwa użytkownika" data-validation="length" data-validation-length="min1" onblur="checkUserName(this.value)" >

                </div>

                <div class="form-group">
                    <label for="password-r" class="uppercase">Hasło</label>
                    <input type="password" value="<?php if(isset($_COOKIE['pw'])) echo $_COOKIE['pw']; ?>" class="form-control" id="password-r" name="password-r" placeholder="Hasło" data-validation="length confirmation" data-validation-length="min6">
                </div>
                <div class="form-group">
                    <label for="password-r2" class="uppercase">Powtórz hasło</label>
                    <input type="password"  value="<?php if(isset($_COOKIE['pw2'])) echo $_COOKIE['pw2']; ?>" class="form-control" id="password-r2" name="password-r_confirmation" placeholder="Hasło" data-validation="length" data-validation-length="min6" data-validation-confirm="password-r">
                </div>
                <div class="form-group">
                    <label for="email-r" class="uppercase">Adres e-mail<span id="usermail-result" style="margin-left: 2rem;"></span></label>
                    <input type="mail"  value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>" class="form-control" id="email-r" name="email-r" placeholder="Adres e-mail" data-validation="length email" data-validation-length="min1" onblur="checkEmail(this.value)" >

                </div>
                <div class="g-recaptcha" data-sitekey="6LdUHCUTAAAAAIMVpjKQLFULhJEO23p1iMQ6bxra"></div>
                <button type="submit" class="btn btn-challenge btn-block" name="register">Zarejestruj się</button>

            </form>
            </div>