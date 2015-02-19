<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +90 533 186 05 87</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> yucel.akkoyun41@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <?php 
                        
                        echo CHtml::link('<img src="'.BaseUrl.'/images/home/logo.png" />',array('/'));
                        ?>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                TÜRKİYE
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">EUROPE</a></li>
                                <li><a href="#">USA</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                <i class="fa fa-turkish-lira"> TL</i>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-euro"> Euro</i></a></li>
                                <li><a href="#"><i class="fa fa-dollar"> Dollar</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            
                                <?php
                                
                                if (!Yii::app()->user->isGuest){
                                echo '<li><a href="#"><i class="fa fa-user"></i> '.
                                Yii::app()->user->first_Name. '</a></li>';
                                }
                                
                                ?>
                            <li><a href="#"><i class="fa fa-star"></i> İstek Listesi</a></li>
                            <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Ödeme Yap</a></li>
                            <li><?php echo CHtml::link('<i class="fa fa-shopping-cart"></i> Sepet',array('cart/index'));?></li> 
                            <li><?php 
                            if (Yii::app()->user->isGuest){
                            echo CHtml::link('<i class="fa fa-sign-in"></i>Giriş Yap',array('site/login'));
                            }
                            else echo CHtml::link('<i class="fa fa-sign-out"></i>Çıkış Yap',array('site/logout'));
                           
                            ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><?php echo CHtml::link('Anasayfa',array('/'));?> </li>
                            <li class="dropdown">
                                <li><a href="">Alışveriş<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><?php echo CHtml::link('Ürünler',array('urunler/index'));?></li>
                                    <li><?php echo CHtml::link('Ürün Ayrıntıları',array('urunler/details'));?></li> 
                                    <li><a href="checkout.html">Satın Al</a></li> 
                                    <li><?php echo CHtml::link('Sepet',array('cart/index'));?></li> 
                                    <li><a href="login.html">Giriş Yap</a></li> 
                                </ul>
                            </li> 
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li> 
                            <li><a href="404.html">404</a></li>
                            <li><a href="contact-us.html">Bize Ulaşın</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Arama Yap"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

