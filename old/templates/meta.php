<?php
if(isset($_GET['post'])){
    $post = getPost($_GET['id']);
    $is_post = 1;
    $desc = strip_tags(html_entity_decode($post['content']));
}else{
    $is_post = 0;
}
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="fb:app_id" content="1400585539956647" />
<meta property="og:url"           content="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'];if(isset($_SERVER['REDIRECT_URL'])) echo $_SERVER['REDIRECT_URL']; ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo 'TITLE_PLACEHOLDER'; ?>" />
<meta property="og:description"   content="<?php if($is_post == 1) echo str_split($desc,150)[0]."..."; ?>" />
<meta property="og:image"         content="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'];if($is_post == 1)echo $post['thumbnail'];else echo '/uploads/aceliga-diamond.png'; ?>" />