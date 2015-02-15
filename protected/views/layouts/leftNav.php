<?php $baseUrl = Yii::app()->baseUrl;?>

<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Kategoriler</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        
                        <?php
                        echo CHtml::link(' <span class="badge pull-right"></span>
                            SPOR GİYİM',array('urunler/urunler'),
                               array(
                                   'submit'=>array('urunler/urunler'),
                                   'params'=>array('id'=>1),
                                   
                               ));
                        ?>
                    </h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            BAY GİYİM
                        </a>
                    </h4>
                </div>
                <div id="mens" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li><a href="#">Fendi</a></li>
                            <li><a href="#">Guess</a></li>
                            <li><a href="#">Valentino</a></li>
                            <li><a href="#">Dior</a></li>
                            <li><a href="#">Versace</a></li>
                            <li><a href="#">Armani</a></li>
                            <li><a href="#">Prada</a></li>
                            <li><a href="#">Dolce and Gabbana</a></li>
                            <li><a href="#">Chanel</a></li>
                            <li><a href="#">Gucci</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                         <?php
                        echo CHtml::link(' <span class="badge pull-right"></span>
                            BAYAN GİYİM',array('urunler/urunler'),
                               array(
                                   'submit'=>array('urunler/urunler'),
                                   'params'=>array('id'=>2),
                                   
                               ));
                        ?>
                    </h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Çocuk GİYİM</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Moda</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">İÇ GİYİM</a></h4>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Çantalar</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Ayakkabılar</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Aksesuarlar</a></h4>
                </div>
            </div>
        </div><!--/category-products-->
        <?php if(Yii::app()->controller->id=='urunler'): ?>
        <div class="brands_products"><!--brands_products-->
            <h2>Markalar</h2>
            <div class="brands-name">
                <?php 
                
                
                $brandProvider=Brand::model()->BrandProvider($catID);
                $brandView ='application.views.system.brandfeed';
                
                $this->widget('zii.widgets.CListView',array(
                    'dataProvider'=>$brandProvider,
                    'itemView'=>$brandView,
                    'itemsCssClass'=>'nav nav-pills nav-stacked',
                    'itemsTagName'=>'ul',
                    'summaryText'=>'',
                    'emptyText' => '',
                    
                ));
                ?>
            </div>
            </div><!--/brands_products-->
            <?php endif;?>
            <div class="price-range"><!--price-range-->
                <h2>Fİyat Aralığı</h2>
                <div class="well">
                    <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                        <b>$ 0</b> <b class="pull-right">$ 600</b>
                </div>
            </div><!--/price-range-->

            <div class="shipping text-center"><!--shipping-->
                <img src="<?php echo $baseUrl ?>/images/home/shipping.jpg" alt="" />
            </div><!--/shipping-->

    </div>
</div>