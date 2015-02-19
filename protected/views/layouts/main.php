<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="LICENCED BY SEVENSEAS SOFTWARE CORP.">
    <meta name="author" content="Yücel 'sevenseas' AKKOYUN">
    <title>Anasayfa | SevenShop</title>
    <?php 
    

    $cs = Yii::app()->getClientScript();
    $cs->registerCssFile(BaseUrl.'/css/bootstrap.min.css');
    $cs->registerCssFile(BaseUrl.'/css/font-awesome.min.css');
    $cs->registerCssFile(BaseUrl.'/css/prettyPhoto.css');
    $cs->registerCssFile(BaseUrl.'/css/price-range.css');
    $cs->registerCssFile(BaseUrl.'/css/animate.css');
    $cs->registerCssFile(BaseUrl.'/css/main.css');
    $cs->registerCssFile(BaseUrl.'/css/responsive.css');
    ?>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/eticaret/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/eticaret/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/eticaret/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/eticaret/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	
	<?php 
        $layoutFolder = '/protected/views/layouts/';    
        Yii::import($layoutFolder.'mainHeader', true); 
        
	echo $content;
        
        Yii::import($layoutFolder.'mainFooter', true);
        ?>
	

    <?php
    
    $cs->registerScriptFile(BaseUrl.'/js/bootstrap.min.js');
    $cs->registerScriptFile(BaseUrl.'/js/jquery.scrollUp.min.js');
    $cs->registerScriptFile(BaseUrl.'/js/price-range.js');
    $cs->registerScriptFile(BaseUrl.'/js/jquery.prettyPhoto.js');
    $cs->registerScriptFile(BaseUrl.'/js/main.js');
	
    ?>
  
</body>
</html>