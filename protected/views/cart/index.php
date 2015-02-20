
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
                        'value' => function($data) {
                           return
                           ' <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                        <input class="cart_quantity_input" type="text" name="quantity" value="'.$data['quantity'].'" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
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
                        'value'=>function(){ return '<a title="Listeden Kaldır" class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>';}
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
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>İl:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

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
                        <li>Sepet Tutarı <span>$59</span></li>
                        <li>Vergi Tutarı <span>$2</span></li>
                        <li>Kargo Tutarı <span>Ücretsiz</span></li>
                        <li>Toplam  <span>$61</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Güncelle</a>
                    <a class="btn btn-default check_out" href="">Hemen Al</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
