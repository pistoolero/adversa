    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
    <script src="/assets/js/validator.js"></script>
    <script src="/assets/js/wow.min.js"></script>
    <script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>
    <script type="text/javascript" src="/assets/js/alertify.min.js"></script>
    

    <script>
      new WOW().init();
    </script>
<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<script type="text/javascript">
    window.cookieconsent_options = {"message":"Ta strona wykorzystuje cookies, aby zapewnić Ci jak najlepsze doświadczenia związane z naszą stroną.","dismiss":"Mam to!","learnMore":"Więcej info","link":null,"theme":"dark-bottom"};
</script>


<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
<!-- End Cookie Consent plugin -->
    <script>
        $(document).ready(function () {
            $('.cc_btn').addClass("btn");
            $('.cc_btn').addClass("btn-common");
            var $aSlc = $('a');
            console.log($aSlc.hasClass('cc_btn'));
            console.log("KAPPA");
        });
    </script>

    <script type="text/javascript">
    function checkUserName(usercheck)
    {
        $('#usercheck-result').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
        $.post("/core/validate-input.php", {usercheck: usercheck} , function(data)
        {
            if (data != '' || data != undefined || data != null)
            {
                $('#usercheck-result').html(data);
            }
        });
    }
</script>
<script type="text/javascript">
    function checkEmail(usercheck)
    {
        $('#usermail-result').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
        $.post("/core/validate-input-email.php", {usercheck: usercheck} , function(data)
        {
            if (data != '' || data != undefined || data != null)
            {
                $('#usermail-result').html(data);
            }
        });
    }
</script>
<script>
$(".alert-cookie").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-cookie").slideUp(500);
});
</script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?php if(isset($_SESSION['id'])): ?>
<script>
    var stillAlive = setInterval(function () {
        /* XHR back to server
         Example uses jQuery */
        $.get("/core/stillAlive.php");
    }, 9000);

</script>
<script>
    $(document).ready(function(){
      var newnot = true;
        setInterval(function() {
            $("#notify_bar").load("/core/notify_bar.php");
          $.ajax({
            type: "POST",
            url: "/core/notifis.php",
            data: {userid: <?= $_SESSION['id']; ?>},
            success: function(data){
                console.log(data);
              if(data.status == true){
                console.log(data);
                $("#notcount").addClass("challenge-link-white");
                $("#notify").show();
                $("#notify").html('<span class="badge circle-badge badge-danger">'+ data.count +'</span>');
                $("#notify_bar").load("/core/notify_bar.php");
                if(data.new == true && newnot == true){
                  $.playSound("/assets/sounds/notify");
                  alertify.log(data.msg);
                  newnot = false;
                  setTimeout(function() {newnot = true}, 1000);
                }
              }else{
                 $("#notcount").removeClass("challenge-link-white"); 
                 $("#notify").hide();
              }
            },
 error: function(xhr, status, error) {
    console.log(xhr.responseText);
 }
          });
        }, 1000);
    });
</script>
<script>
    $(document).ready(function(){
        setInterval(function() {
          $.ajax({
            type: "POST",
            url: "/core/friendship_requests.php",
            data: {userid: <?= $_SESSION['id']; ?>},
            success: function(data){
              if(data.status == true){

                $("#reqcount").addClass("challenge-link-white");
                $("#req").show();
                $("#req").html('<span class="badge circle-badge badge-danger">'+ data.count +'</span>');
              }else{
                 $("#reqcount").removeClass("challenge-link-white"); 
                 $("#req").hide();
              }
            },
 error: function(xhr, status, error) {
    console.log(xhr.responseText);
 }
          });
        }, 1000);
    });
</script>
<script type="text/javascript">
function clearNots() {
    $.get("/core/clear_unseen.php");
    $("#notify").hide();
    return false;
}
</script>
<?php else: ?>
<script type="text/javascript">
    $(document).ready(function(){
    $("#add_err").css('display', 'none', 'important');
     $("#login").click(function(){  
          username=$("#username").val();
          password=$("#password").val();
          $.ajax({
           type: "POST",
           url: "../core/login.php",
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
                $("#add_err").html("<div class='alert alert-dismissible alert-warning z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Taki użytkownik nie istnieje");
            }else if(html=="password"){
                $("#add_err").html("<div class='alert alert-dismissible alert-warning z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Niepoprawne hasło");
            }else if(html=="active"){
                $("#add_err").html("<div class='alert alert-dismissible alert-warning z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Twoje konto nie jest aktywne!");
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
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function(){
    $("#error").css('display', 'none', 'important');
     $("#create").click(function(){  
          teamname=$("#teamname").val();
          tag=$("#tag").val();
          var n = 4;

          $.ajax({
           type: "POST",
           url: "../core/create_team.php",
            data: {teamname: teamname,tag:tag},
           success: function(html){ 
            $("#response").html(html);
            if(html=='true')    {
          setTimeout(countDown,1000);
          function countDown(){
             n--;
             if(n > 0){
                setTimeout(countDown,1000);
             }
             $("#create").html('<i class="fa fa-check fa-fw"></i> &nbsp; Okno zamknie się za ' + n + "s.");
          }
            $("#error").css('display', 'inline', 'important');
                        $("#error").html("<div class='alert alert-dismissible alert-success z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-check'></span> Drużyna została stworzona!");
              $("#create").removeClass("btn-challenge");
              $("#create").addClass("btn-success");
      setTimeout(' window.location.href = "/"; ',4000);
            }
            else    {
            $("#error").css('display', 'inline', 'important');
            if(html=="name"){
                $("#error").html("<div class='alert alert-dismissible alert-danger z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Nazwa jest zajęta");
            }else if(html == "tag"){
               $("#error").html("<div class='alert alert-dismissible alert-danger z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Tag zajęty");
            }else if(html == "blank"){
                 $("#error").html("<div class='alert alert-dismissible alert-danger z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Wypełnij wszystkie pola");
            }else if(html == "too_long"){
                 $("#error").html("<div class='alert alert-dismissible alert-danger z-depth-1' role='alert' style='margin-bottom: 2em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> Tag może mieć maksymalnie 6 znaków");
            }
             
             $("#create").html("Załóż");
            }
           },
           beforeSend:function()
           {
            $("#error").css('display', 'inline', 'important');
            $("#create").blur();
            $("#create").html('<i class="fa fa-spinner fa-pulse fa-fw"></i>Ładowanie...')
           }
          });
        return false;
    });
});
</script>
<script>

    // $('#loader_img').show();
    // $('#loginBoxContent').on('load', function(){

    //     // hide/remove the loading image
    //     $('#loader_img').hide();
    // });
    // $(function() {
    //    $("#loginBoxContent").load("/views/login.php");
    // });
        
</script>
<script type="text/javascript">
  $(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-challenge").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-challenge");   
});
});
</script>
<script>
  // ADD SLIDEDOWN ANIMATION TO DROPDOWN //
  $('.dropdown').on('show.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown("fast");
  });

  // ADD SLIDEUP ANIMATION TO DROPDOWN //
  $('.dropdown').on('hide.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp("fast");
  });
</script>

    <script type="text/javascript">
$(document).ready(function(){
  // store the currently selected tab in the hash value
$("a").on("shown.bs.tab", function(e) {
  var id = $(e.target).attr("href").substr(1);
  window.location.hash = id;
});

    if (window.location.hash) {
      console.log(window.location.hash)
        $('a[href="' + window.location.hash + '"]').tab('show');
        $( ".btn-challenge" ).removeClass( "btn-challenge" ).addClass("btn-default");
        $('a[href="' + window.location.hash + '"]').removeClass("btn-default").addClass("btn-challenge");
    }
});
    </script>
