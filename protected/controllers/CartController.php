<?php

class CartController extends Controller
{
	public function actionIndex()
	{
            if(!Yii::app()->user->isGuest){
            $cartProvider = Cart::model()->CartDataProvider();
            
            $this->render('index',array('cartProvider'=>$cartProvider));
            
            }
            else $this->redirect(array('site/login'));
	}
        
        public function actionAddToCart() {
            
            if(isset($_POST)){
                    Cart::model()->InsertCart($_POST);
                
            }
        }
        
        public function actionCheckOut() {
            
            if(!Yii::app()->user->isGuest){
            $cartProvider = Cart::model()->CartDataProvider();
            
            $this->render('checkout',array('cartProvider'=>$cartProvider,'bill'=>new Bill()));
            
            }
            else $this->redirect(array('site/login'));
            
        }   
        public function actionQuantDown() {
            
            if(isset($_POST))
            {
                $p_id = $_POST['item'];
                Cart::model()->quant($p_id,'down');
                echo 'success';
            }
            
        }
        
        public function actionQuantUp() {
            
            if(isset($_POST))
            {
                $p_id = $_POST['item'];
                Cart::model()->quant($p_id,'up');
            }
       
        }
        
       public function actionDeleteItem() {
           
           if(isset($_POST))
           {
               $p_id = $_POST['item'];
               Cart::model()->removeItem($p_id);
           }
           
       }
       
       public function actionChangeDrop(){
           if(isset($_POST)){
               Country::model()->getCities($_POST['country']);
           }
           
       }
       
       public function actionBuy(){
           if(isset($_POST)){
           $bill = new Bill();
           
           $bill->attributes=$_POST['Bill'];
           $bill->user_id = Yii::app()->user->id;
           
           if($bill->validate()){    
           $checkout = new Checkout();
           $cart = Cart::model()->findByAttributes(array('user_id'=>$bill->user_id));
           
           $checkout->attributes = $cart->attributes;
           $checkout->date = date('d-m-Y H:i:s');
           if($checkout->save()){
               $bill->checkout_id=$checkout->_id->{'$id'};
               $bill->date = $checkout->date;
               $cart->delete();
               $bill->save();
           }
        }
       }
       $this->redirect(array('/site/index'));
    }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}