<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-02-07
 * Time: 15:17
 */

Site::javascript('jquery-min');
Site::javascript('bootstrap.min');
Site::javascript('jquery.okayNav-min');
Site::javascript('jquery.mixitup.min');
Site::javascript('jquery.inview');
Site::javascript('jquery.counterup.min');
Site::javascript('scroll-top');
Site::javascript('material.min');
Site::javascript('switcher');
Site::javascript('owl.carousel.min');
Site::javascript('wow');
Site::javascript('main');
?>


<script type="text/javascript">
    window.cookieconsent_options = {"message":"Ta strona wykorzystuje cookies, aby zapewnić Ci jak najlepsze doświadczenia związane z naszą stroną.","dismiss":"Mam to!","learnMore":"Więcej info","link":null,"theme":"dark-bottom"};
</script>
<?php Site::javascript('cookieconsent.min'); ?>

<script>
    $("#to_register").click(function(){
        $('#loginBox').modal('hide');
    });
    $("#to_login").click(function(){
        $('#registerBox').modal('hide');
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#add_err").css('display', 'none', 'important');
        $("#login").click(function(){
            username=$("#username").val();
            password=$("#password").val();
            $.ajax({
                type: "POST",
                url: "router.php",
                data: {username: username, password: password, login : "login"},

                    success: function(html){
                    $("#response").html(html);
                    if(html=='true')    {
                        $("#add_err").css('display', 'inline', 'important');
                        $("#add_err").html("<div class='alert alert-dismissible alert-success z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-check'></span> Dane poprawne. Logowanie...");
                        $("#login").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> &nbsp; Logowanie ...');
                        setTimeout(' window.location.href = "/"; ',2500);
                    }
                    else    {
                        $("#add_err").css('display', 'inline', 'important');
                        if(html=="username"){
                            $("label[for='username']").html("Login");
                            $("label[for='password']").html("Hasło");
                            $("#add_err").html("<div class='alert alert-dismissible alert-warning z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Taki użytkownik nie istnieje");
                        }else if(html=="password"){
                            $("label[for='username']").html("Login");
                            $("label[for='password']").html("Hasło");
                            $("#add_err").html("<div class='alert alert-dismissible alert-warning z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Niepoprawne hasło");
                        }else if(html=="active"){
                            $("label[for='username']").html("Login");
                            $("label[for='password']").html("Hasło");
                            $("#add_err").html("<div class='alert alert-dismissible alert-warning z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Twoje konto nie jest aktywne!");
                        }else if(html=="blank"){
                            $("#add_err").html("<p class='text-danger text-center'>Wypełnij wszystkie pola!</p>");
                        }else{
                            $("#add_err").html(html);
                        }


                        $("#login").html("Zaloguj");
                    }
                },
                beforeSend:function()
                {
                    $("#add_err").css('display', 'inline', 'important');
                    $("#login").html('<i class="fa fa-spinner fa-pulse fa-fw"></i>Ładowanie...<br />')
                }
            });

            return false;
        });
    });

</script>