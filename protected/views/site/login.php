
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Oturum Aç</h2>
                       <?php 
                       $form = $this->beginWidget('CActiveForm',array(
                              'enableClientValidation' => true,
                                'clientOptions'=>array(
                                'validateOnSubmit'=>true,
                                'validateOnChange'=>true,
                                'validateOnType'=>true,
                                'class'=>'form',
                                'type' =>'horizontal',
                                ), 
                       ));
                       
                       echo $form->errorSummary($model);
                       
                       echo $form->textField($model,'username',array('placeholder'=>'Kullanıcı Adı'));
                       echo $form->error($model,'username');
                       
                       echo $form->passwordField($model,'password',array('placeholder'=>'Şifre'));
                       echo $form->error($model,'password');
                       
                       echo '<span>';
                       echo $form->checkBox($model,'rememberMe',array('class'=>'checkbox'));
                       echo 'Oturumu Açık Tut';
                       echo '</span>';   
                       echo '<button type="submit" name="LoginButton" class="btn btn-default">Giriş</button>';
                       $this->endWidget();
                       ?>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">YA DA</h2>
            </div>
            <div class="col-sm-4">
               <button type="button" onClick="js:location.href='singup'" name="SignButton" class="singup-button">Kayıt Ol</button>'
            
            </div>
        </div>
    </div>
</section><!--/form-->



