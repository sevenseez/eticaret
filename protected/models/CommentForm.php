<?php

class CommentForm extends CFormModel {
    
    
    
    public $comment;
    public $commet_id;
    
    
    
public function InsertComment() {

    if(isset($_POST['commentSubmit']))
    {
        $mongo = Yii::app()->mongodb->getConnection();
        $db = $mongo->selectDB('eTicaretDatabase');
        $collection = $db->selectCollection('ProductDetails');
        
       $new_comment = array(
            "user_id" => Yii::app()->user->id,
            "date" => date('d-m-Y H:i:s'),
            "comment" => $_POST['commentText']
          );
       
       $row_id = new MongoId($_POST['comment_id']);
        
       $collection->update(
            array("_id" => $row_id), 
            array('$push' => array("comments" => $new_comment))
          );
       return true;
    }
    
}

public function CommentProvider($a) {
    
      return new CArrayDataProvider($a,array(
                                         'keyField'=>'user_id',
                                         'keys'=>array('user_id','date', 'comment'),
                                          'pagination'=>array(
                                              'pageSize'=>'3',
                                              )
                                      ));
    
}
}