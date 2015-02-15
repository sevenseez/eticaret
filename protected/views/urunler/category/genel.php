<?php $baseUrl = Yii::app()->baseUrl; ?>
<section id="advertisement">
        <div class="container">
                <img src="<?php echo $baseUrl?>/images/shop/advertisement.jpg" alt="" />
        </div>
</section>


<section>
        <div class="container">
                <div class="row">
                     <?php include Yii::app()->basePath.'/views/layouts/leftNav.php';?>
                        <div class="col-sm-9 padding-right">
                                <div class="features_items"><!--features_items-->
                                        <h2 class="title text-center">Features Items</h2>
                                            <?php

                                             $this->widget('zii.widgets.CListView', array(
                                                                    'dataProvider' => $ProductProvider,
                                                                    'itemsTagName' => 'div',
                                                                    'itemView' => $itemView,
                                                                    'summaryText'=>'',
                                                                    'emptyText' => 'Sonuç Bulunamadı.',
                                                                    ));?>
                                </div><!--features_items-->
                        </div>
                </div>
        </div>
</section>