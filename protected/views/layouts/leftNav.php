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
                            SPOR GİYİM',array('urunler/categories','id'=>1));
                        ?>
                    </h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                       <?php
                        echo CHtml::link(' <span class="badge pull-right"></span>
                            BAY GİYİM',array('urunler/categories','id'=>2));
                        ?>
                    </h4>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                         <?php
                        echo CHtml::link(' <span class="badge pull-right"></span>
                            BAYAN GİYİM',array('urunler/categories','id'=>3));
                        ?>
                    </h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"> 
                        <?php
                        echo CHtml::link(' <span class="badge pull-right"></span>
                            ÇOCUK GİYİM',array('urunler/categories','id'=>4));
                        ?></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                         <?php
                        echo CHtml::link(' <span class="badge pull-right"></span>
                            İÇ GİYİM',array('urunler/categories','id'=>5));
                        ?>
                    </h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                         <?php
                        echo CHtml::link(' <span class="badge pull-right"></span>
                            ÇANTALAR',array('urunler/categories','id'=>6));
                        ?>
                    </h4>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                         <?php
                        echo CHtml::link(' <span class="badge pull-right"></span>
                            AYAKKABILAR',array('urunler/categories','id'=>7));
                        ?>
                    </h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                         <?php
                        echo CHtml::link(' <span class="badge pull-right"></span>
                            AKSESUARLAR',array('urunler/categories','id'=>8));
                        ?>
                    </h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                         <?php
                        echo CHtml::link(' <span class="badge pull-right"></span>
                            MODA',array('urunler/categories','id'=>9));
                        ?>
                    </h4>
                </div>
            </div>
        </div><!--/category-products-->
        <?php if(Yii::app()->controller->id=='urunler' && Yii::app()->controller->action->id!='index'): ?>
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