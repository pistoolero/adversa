<?php

require_once "/../templates/header.php";
include_once "top.php";
?>
    <div id="page-wrapper" class="">
    <?php errorControl();
    ?>
    <?php
        ?>

    <?php
        if (isset($_GET['page'])) {
            $require = __DIR__.DIRECTORY_SEPARATOR.$_GET['page'].'.php';
            switch ($_GET['page']) {
                case
                'main':
                    require_once '/../views/' . 'index.php';
                    break;
            }
            if(file_exists($require)){
                require_once '/views/' . $_GET['page'] . '.php';
            }else{
                header("HTTP/1.0 404 Not Found");
                $error = http_response_code();
                require_once '/404.php';
                clearstatcache();

            }
        } elseif(!isset($_GET['post'])) {
            require_once __DIR__.DIRECTORY_SEPARATOR . 'index.php';
        }
        if(isset($_GET['post'])) {
            require_once __DIR__.'/post.php';
        }
    ?>
    </div>
<?php
require_once("/../templates/footer.php");
?>