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