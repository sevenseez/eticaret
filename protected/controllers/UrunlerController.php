<?php

class UrunlerController extends Controller
{       
       public function accessRules() {
        return array(
            
            array('deny', 
                 'users' => array('@'),
                  
            ),
            array('allow', 
                'users' => array('*'),
               
            ),
            
            );
        }
        public function init() {
       
            
        }
        
	public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionUrunler($id) {
            
            
             $ProductProvider = Product::model()->ProductProvider($id);
             if($ProductProvider->getTotalItemCount()<1){
                 
                 $this->redirect('system/error');
             }
             $itemView = 'application.views.urunler.category.itemfeed';
             $this->render('category/genel',array('ProductProvider'=>$ProductProvider,'itemView'=>$itemView));
        
        }
       
        public function actionDetails() {
            
            
            $this->render('details');
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