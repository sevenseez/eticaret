
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
                         return '<a href=""><img width="200px" height="150px" src="'.BaseUrl.'/images/shop/'.$data->images[0]['image_name'].'" alt=""></a>';
                         
                        }),
                    array('header'=>'',
                          'htmlOptions'=>array('class'=>'cart_description','style'=>';margin-right:50px;'),
                          'type'=>'raw',
                          'value'=>function($data){
                            return '<h4><a href="">'.$data->product_name.'</a></h4><p>Web ID:'.$data->product_id.'</p>';
                          }
                        ),
                    array('header'=>'Fiyat',
                         'htmlOptions'=>array('class'=>'cart_price','style'=>'padding-right:50px!important;'),
                        'type'=>'raw',
                        'value'=> function($data) {return '<p>$'.$data->price.'</p>';},
                        ),
                    array(
                        'type'=>'raw',
                        'header'=>'Ölçü',
                        'htmlOptions'=>array('class'=>'cart_quantity'),
                        'value' => function($data) {
                           return
                           ' <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="'.$data->quantity.'" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                            </div>';
                        }
                        ),
                    array('name'=>'Toplam',
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'cart_total'),
                        'value'=>function($data) {
                            return '<p class="cart_total_price">$'.$data->price*$data->quantity.'</p>';
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
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                                <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                                <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
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
                            <label>Region / State:</label>
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
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>$61</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->