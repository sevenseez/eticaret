<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SevenShop</title>
    <?php 
    $baseUrl = Yii::app()->request->baseUrl;
    ?>
    <link href="<?php echo $baseUrl;?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $baseUrl;?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $baseUrl;?>/css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo $baseUrl?>/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $baseUrl?>/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $baseUrl?>/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $baseUrl?>/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $baseUrl?>/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<div class="container text-center">
		<div class="logo-404">
			<?php echo CHtml::link('<img src="'.$baseUrl.'/images/home/logo.png" alt="" />',array('/')); ?>
		</div>
		<div class="content-404">
			<img src="<?php echo $baseUrl?>/images/404/404.png" class="img-responsive" alt="" />
			<h1><b>Üzgünüz!</b> Bu Sayfayı Bulamadık</h1>
			<p>İzin verin, aramaya devam edelim ;)</p>
			<h2>
                        <?php echo CHtml::link('Ana sayfaya Dön',array('/')); ?>
                        </h2>
		</div>
	</div>


   
    <script src="<?php echo $baseUrl;?>/js/jquery.js"></script>
    <script src="<?php echo $baseUrl;?>/js/price-range.js"></script>
    <script src="<?php echo $baseUrl;?>/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo $baseUrl;?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $baseUrl;?>/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo $baseUrl;?>/js/main.js"></script>
</body>
</html>