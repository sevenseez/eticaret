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
            
            $this->render('checkout',array('cartProvider'=>$cartProvider));
            
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
           if(isset($_POST['country'])){
               Country::model()->getCities($_POST['country']);
           }
           
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