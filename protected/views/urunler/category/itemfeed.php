<?php $baseUrl = Yii::app()->baseUrl;?>
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <?php echo CHtml::link('<img src="'.$baseUrl.'/images/shop/'.$data->image.'" alt=""/>'
                        . '<h2>'.$data->price.'</h2><p>'.$data->product_name.'</p>',
                        array('urunler/details/'.str_replace(' ', '_', $data->product_name))
                            );
                ?>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
            </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href=""><i class="fa fa-plus-square"></i>İstek Listesine Ekle</a></li>
                <li><a href=""><i class="fa fa-plus-square"></i>Karşılaştırmak için Ekle</a></li>
            </ul>
        </div>
    </div>
</div>
