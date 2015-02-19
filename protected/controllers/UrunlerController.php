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
                $ProductProvider = Product::model()->ProductProvider(0);
                
                 if($ProductProvider->getTotalItemCount()<1){
                 
                    $this->redirect('system/error');
                }
                $itemView = 'application.views.urunler.category.itemfeed';
		$this->render('category/genel',array('itemView'=>$itemView,'ProductProvider'=>$ProductProvider));
	}
        
        public function actionCategories() {
                
           
            if(isset($_GET) && !empty($_GET['id'])){
             $id=$_GET['id'];
             $ProductProvider = Product::model()->ProductProvider($id);
             if($ProductProvider->getTotalItemCount()<1){
                 
                 $this->redirect('system/error');
             }
             $itemView = 'application.views.urunler.category.itemfeed';
             $this->render('category/genel',array('catID'=>$id,'ProductProvider'=>$ProductProvider,'itemView'=>$itemView));
            }
            else $this->redirect(array('system/'));
        }
       
        public function actionDetails() {
                if(isset($_GET['pn'])){
                $product_name = str_replace('_', ' ', $_GET['pn']);
                $cf = new CommentForm();
                if($cf->InsertComment())
                    $this->refresh ();
                $model = ProductDetail::model()->findByAttributes(array('product_name'=>$product_name));
                if ($model) 
                    $array=$model->comments; 
                else $array= array();
                $CommentProvider = $cf->CommentProvider($array);
                $this->render('details',array('model'=>$model,'catID'=>$model->category_id,'CommentProvider'=>$CommentProvider));
                }
                else $this->redirect(array('system/'));
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