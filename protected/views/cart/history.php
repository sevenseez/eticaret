<?php Yii::app()->clientScript->registerScriptFile(BaseUrl.'/js/gridOptions.js');?> 
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="index">Home</a></li>
                <li class="active">Alışveriş Geçmişi</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php 
            $this->widget('application.components.MyGridView',array(
                'dataProvider' => $checkoutProvider,
                'id' => 'historyGrid',
                'emptyText'=>'<p style="font-size:20px;">KAYIT BULUNAMADI</p>',
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
                           ' <div class="cart_quantity_button"> 
                        <input class="cart_quantity_input" type="text" id="tableQuant" name="quantity" 
                        value="'.$data['quantity'].'" autocomplete="off" size="2">
                            </div>';
                        }
                        ),
                    array('name'=>'Toplam',
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'cart_total'),
                        'value'=>function($data) {
                        return '<p class="cart_total_price">$'.$data['product_price']*$data['quantity'].'</p>';
                        }),
                    )
            ));
            
            
            ?>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action" style="margin-left:675px;">
    <div class="container">
        <div class="heading">
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <?php $totalCart = Checkout::model()->getTotal($checkoutProvider->rawData); ?>
                        <li>Sepet Tutarı <span><?php echo $totalCart[0]?></span></li>
                        <li>Vergi Tutarı <span><?php echo $totalCart[1]?></span></li>
                        <li>Kargo Tutarı <span>Ücretsiz</span></li>
                        <li>Toplam  <span><?php echo array_sum($totalCart);?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
