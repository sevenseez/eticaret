
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading">Step1</h2>
        </div>
        <div class="checkout-options">
            <h3>New User</h3>
            <p>Checkout options</p>
            <ul class="nav">
                <li>
                    <label><input type="checkbox"> Register Account</label>
                </li>
                <li>
                    <label><input type="checkbox"> Guest Checkout</label>
                </li>
                <li>
                    <a href="" data-dismiss="checkout-options"><i class="fa fa-times"></i>Cancel</a>
                </li>
            </ul>
        </div><!--/checkout-options-->

        <div class="register-req">
            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Shopper Information</p>
                        <form>
                            <input type="text" placeholder="Display Name">
                            <input type="text" placeholder="User Name">
                            <input type="password" placeholder="Password">
                            <input type="password" placeholder="Confirm password">
                        </form>
                        <a class="btn btn-primary" href="">Get Quotes</a>
                        <a class="btn btn-primary" href="">Continue</a>
                        </div>
                        </div>
                        <div class="col-sm-5 clearfix">
                            <div class="bill-to">
                                <p>Bill To</p>
                                <div class="form-one">
                                        <?php 
                                        echo CHtml::beginForm();
                                        echo CHtml::textField('cpname','',array('placeholder'=>'Şirket Adı'));
                                        echo CHtml::textField('email','',array('placeholder'=>'E-Posta'));
                                        echo CHtml::textField('title','',array('placeholder'=>'Başlık'));
                                        echo CHtml::textField('name','',array('placeholder'=>'Ad'));
                                        echo CHtml::textField('surname','',array('placeholder'=>'Soyad'));
                                        echo CHtml::textField('address1','',array('placeholder'=>'Adres 1'));
                                        echo CHtml::textField('address2','',array('placeholder'=>'Adres 2'));
                                        echo CHtml::endForm();
                                        
                                        ?>
                                </div>
                                <div class="form-two">
                                    <form>
                                        <?php
                                        echo CHtml::form();
                                        echo CHtml::textField('postal_code','',array('placeholder'=>'Zip / Posta Kodu'));
                                        echo CHtml::dropDownList('countryDrop', '_id{$id}' , Country::model()->countries,
                                   array('empty'=>'--- Ülkeler ---','ajax'=>array(
                                       'type'=>'POST',
                                       'url'=>CController::createUrl('cart/changeDrop'),
                                       'update'=>'#cityDrop',
                                       'data'=>"js:{country:$('#countryDrop').val()}"                                       
                                   )));
                                        echo CHtml::dropDownList('cityDrop', '', array(),array('empty'=>'--- Şehirler ---'));
                                        echo CHtml::textField('password','',array('placeholder'=>'Şifre'));
                                        echo CHtml::textField('phone','',array('placeholder'=>'Ev Telefonu'));
                                        echo CHtml::textfield('mobile','',array('placeholder'=>'Cep Telefonu'));
                                        echo CHtml::textField('fax','',array('placeholder'=>'Fax'));        
                                        echo CHtml::endForm();
                                        ?>
                                    </div>
                                </div>
                            </div>
                                <div class="col-sm-4">
                                    <div class="order-message">
                                        <p>Kargo Sipariş</p>
                                        <textarea name="message"  placeholder="Sipariş hakkında notlar, teslim konusunda özel notlar" rows="16"></textarea>
                                        <label><input type="checkbox"> Kargo kredi adresine gelsin</label>
                                    </div>	
                                </div>					
                                </div>
                                </div>
                                <div class="review-payment">
                                    <h2>Alışveriş Özeti & Ödeme</h2>
                                </div>
                                <div class="table-responsive cart_info">
                                <?php
                                   $this->widget('application.components.MyGridView',
 ['dataProvider' => $cartProvider,
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
                                                 ),
                                             )
                                            ]);
                                        ?>
                                    <div colspan="4">&nbsp;</div>
                                            <div colspan="2">
                                                <div class="total-result">
                                                    <?php $totalCart = Cart::model()->getTotal($cartProvider->getData()); ?>
                                                    <div><p>Sepet Tutarı</p><span><?php echo '$'.$totalCart[0]?></span></div>
                                                    <div><p>Vergi Tutarı</p><span><?php echo '$'.$totalCart[1]?></span></div>
                                                    <div class="shipping-cost"><p>Kargo Tutarı</p><span>Ücretsiz</span></div>
                                                    <div><p>Toplam</p> <span class="result"><?php echo array_sum($totalCart);?></span></div>
                                                </div>
                                            </div>
                                </div>
                                <div class="payment-options">
                                    <span>
                                        <label><input type="checkbox"> Direct Bank Transfer</label>
                                    </span>
                                    <span>
                                        <label><input type="checkbox"> Check Payment</label>
                                    </span>
                                    <span>
                                        <label><input type="checkbox"> Paypal</label>
                                    </span>
                                </div>
                                </div>
                                </section> <!--/#cart_items-->
