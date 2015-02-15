<section>
    <div class="container">
        <div class="row">
            <?php 
            $baseUrl = Yii::app()->baseUrl;
            include Yii::app()->basePath . '/views/layouts/leftNav.php'; ?>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="<?php echo $baseUrl ?>/images/shop/<?php $img = $model->images; echo $img[0]['image_name']?>" alt="" />
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <?php 
                                    for($i=1;$i<count($img)+1;$i++){
                                        if($i==count($img)) $k=$i%count($img); else $k=$i;
                                        echo '<a href=""><img height="84px" width="90px" src="'.$baseUrl.'/images/shop/'.$img[$k]['image_name'].'" alt=""></a>';
                                    }
                                    ?>
                                </div>
                                <div class="item">
                                    <a href=""><img src="<?php echo $baseUrl ?>/images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="<?php echo $baseUrl ?>/images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="<?php echo $baseUrl ?>/images/product-details/similar3.jpg" alt=""></a>
                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="<?php echo $baseUrl ?>/images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2><?php echo $model->product_name ?> </h2>
                            <p>Web ID: <?php echo $model->product_id;?></p>
                            <img src="<?php echo $baseUrl ?>/images/product-details/rating.png" alt="" />
                            <span>
                                <span>US $<?php echo $model->price?></span>
                                <label>Quantity:</label>
                                <input type="text" value="<?php echo $model->quantity?>" />
                                <button type="button" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Sepete Ekle
                                </button>
                            </span>
                            <p><b>Erişebilirlik:</b> <?php echo strtoupper($model->availability);?></p>
                            <p><b>Durum:</b> <?php echo strtoupper($model->state);?></p>
                            <p><b>Marka:</b> <?php echo strtoupper($model->brand);?></p>
                            <a href=""><img src="<?php echo $baseUrl ?>/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Ayrıntılar</a></li>
                            <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                            <li><a href="#tag" data-toggle="tab">Tag</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Yorumlar <?php echo '('.count($model->comments).')';?></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >
                       
                        </div>

                        <div class="tab-pane fade" id="companyprofile" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo $baseUrl ?>/images/home/gallery1.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>

                        <div class="tab-pane fade" id="tag" >
                           
                        </div>
                       
                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">
                                
                                <?php 
                                      $CommentProvider = new CArrayDataProvider($model->comments,array(
                                         'keyField'=>'user_id',
                                          'pagination'=>array('pageSize'=>'5')
                                      ));
                                      
                                      
                                       $commentView = 'application.views.extra.commentfeed';
                                      
                                        $this->widget('zii.widgets.CListView', array(
                                                    'dataProvider' => $CommentProvider,
                                                    'itemsTagName' => 'ul',
                                                    'itemView' => $commentView,
                                                    'summaryText'=>'',
                                                    'emptyText' => 'Sonuç Bulunamadı.',
                                            ));
                                                                   
                                 if(!Yii::app()->user->isGuest) :?>
                                
                                <p><b>Yorum Ekle</b></p>
                                <form method="POST">
                                    <input type="hidden" name="comment_id" value="<?php echo $model->_id->{'$id'} ?>" >
                                    <textarea name="commentText"></textarea>
                                    <button type="submit" name="commentSubmit" class="btn btn-default pull-right">
                                        Gönder
                                    </button>
                                    
                                </form>
                                
                            <?php else: echo 'Yorum eklemek istiyorsanız ';
                                      echo CHtml::link('HEMEN ÜYE OLUN',array('site/login'));
                            endif;?>
                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">ÖNERİLEN ÜRÜNLER</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo $baseUrl ?>/images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo $baseUrl ?>/images/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo $baseUrl ?>/images/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo $baseUrl ?>/images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo $baseUrl ?>/images/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo $baseUrl ?>/images/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>			
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>