<?php Yii::app()->clientScript->registerScriptFile(BaseUrl.'/js/gridOptions.js');?> 
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="index">Home</a></li>
                <li class="active">Alışveriş Sepeti</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php 
            $this->widget('application.components.MyGridView',array(
                'dataProvider' => $cartProvider,
                'id' => 'cartGrid',
                'summaryText'=>'',
                'columns'=>array(
                    array('name'=>'Eşya',
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'cart_product','style'=>'max-width:200px;'),
                        'value'=>function($data){
                        return '<a href=""><img width="200px" height="150px" src="'.BaseUrl.'/images/shop/'.$data['product_image'].'" alt=""></a>';
                         
                        }),
                    array('header'=>'',
                          'htmlOptions'=>array('class'=>'cart_description','style'=>';margin-right:50px;'),
                          'type'=>'raw',
                          'value'=>function($data){
                          return '<h4><a href="">'.$data['product_name'].'</a></h4><p>Web ID:'.$data['product_id'].'</p>';
                          }
                        ),
                    array('header'=>'Fiyat',
                         'htmlOptions'=>array('class'=>'cart_price','style'=>'padding-right:50px!important;'),
                        'type'=>'raw',
                        'value'=> function($data) {return '<p>$'.$data['product_price'].'</p>';},
                        ),
                    array(
                        'type'=>'raw',
                        'header'=>'     Sayı',
                        'htmlOptions'=>array('class'=>'cart_quantity'),
                        'value' => function($data)
                        { 
                        $item= $data['product_id'];
                           return
                           ' <div class="cart_quantity_button"> '.
                              CHtml::ajaxlink('+', Yii::app()->createUrl('cart/quantUp'),array(
                               'type'=>'POST',
                               'data'=> array('item'=>$item),
                               'success'=>"js:function() { $.fn.yiiGridView.update('cartGrid');}"
                           ),array('class'=>'cart_quantity_down')).'
                               
                        <input class="cart_quantity_input" type="text" id="tableQuant" name="quantity" 
                        value="'.$data['quantity'].'" autocomplete="off" size="2">'.
                           CHtml::ajaxlink('-', Yii::app()->createUrl('cart/quantDown'),array(
                               'type'=>'POST',
                               'data'=> array('item'=>$item),
                               'success'=>"js:function() { $.fn.yiiGridView.update('cartGrid');}"
                           ), array('class'=>'cart_quantity_down')).'
                            </div>';
                        }
                        ),
                    array('name'=>'Toplam',
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'cart_total'),
                        'value'=>function($data) {
                        return '<p class="cart_total_price">$'.$data['product_price']*$data['quantity'].'</p>';
                        }),
                    array('header'=>'',
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'cart_delete'),
                        'value'=>function($data){ 
                            return CHtml::ajaxLink('<i class="fa fa-times"></i>',Yii::app()->createUrl('cart/deleteItem'),
                                    array(
                                    'type'=>'POST',
                                    'data'=>array('item'=>$data['product_id']),
                                    'success'=>'js:function() {$.fn.yiiGridView.update("cartGrid");}'
                                    ),
                                    array('class'=>'cart_quantity_delete','title'=>'Listeden Kaldır')
                                    );
                        }
                        )
                    )
            ));
            
            
            ?>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Şimdi ne yapmak istersiniz?</h3>
            <p>Kullanmak istediğiniz indirim kuponu yada alışveriş puanınız varsa lütfen burayı seçiniz.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                                <label>Kuponu Kullan</label>
                        </li>
                        <li>
                            <input type="checkbox">
                                <label>Hediye Puanları Kullan</label>
                        </li>
                        <li>
                            <input type="checkbox">
                                <label>Tahmini Kargo & Vergiler</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Ülke :</label>
                           <?php echo CHtml::dropDownList('countryDrop', '_id{$id}' , Country::model()->countries,
                                   array('empty'=>'Seçiniz','ajax'=>array(
                                       'type'=>'POST',
                                       'url'=>CController::createUrl('cart/changeDrop'),
                                       'update'=>'#cityDrop',
                                       'data'=>"js:{country:$('#countryDrop').val()}"                                       
                                   )));?>

                        </li>
                        <li class="single_field">
                            <label>Şehir:</label>
                            <?php echo CHtml::dropDownList('cityDrop', '', array(),array('empty'=>'Seçiniz'));?>
                        </li>
                        <li class="single_field zip-field">
                            <label>Posta Kodu:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Devam Edin</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <?php $totalCart = Cart::model()->getTotal($cartProvider->getData()); ?>
                        <li>Sepet Tutarı <span><?php echo $totalCart[0]?></span></li>
                        <li>Vergi Tutarı <span><?php echo $totalCart[1]?></span></li>
                        <li>Kargo Tutarı <span>Ücretsiz</span></li>
                        <li>Toplam  <span><?php echo array_sum($totalCart);?></span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Güncelle</a>
                    <a class="btn btn-default check_out" href="">Hemen Al</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
