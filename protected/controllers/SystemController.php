<?php

class SystemController extends Controller
{
	/**
	 * Declares class-based actions.
	 */

	public function actionError()
	{       
                
		if($error=Yii::app()->errorHandler->error)
		{   
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->renderPartial('error404', $error);
		}
	}

	
        
}