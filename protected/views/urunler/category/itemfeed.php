<?php $baseUrl = Yii::app()->baseUrl; ?>
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img src="<?php echo $baseUrl ?>/images/shop/<?php echo $data->image?>" alt="" />
                <h2>$<?php echo $data->price?></h2>
                <p><?php echo $data->product_name ?></p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
                </div>
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
