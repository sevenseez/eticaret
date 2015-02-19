<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="signup-form"><!--sign up form-->
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'enableClientValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                            'validateOnChange' => true,
                            'validateOnType' => true,
                            'class' => 'form',
                            'type' => 'horizontal',
                        ),
                    ));

                    echo $form->errorSummary($model);

                    echo $form->textField($model, 'name', array('placeholder' => 'Ad Soyad'));
                    echo $form->error($model, 'name');

                    echo $form->textField($model, 'login', array('placeholder' => 'Kullanıcı Adı'));
                    echo $form->error($model, 'login');

                    echo $form->passwordField($model, 'pass', array('placeholder' => 'Şifre'));
                    echo $form->error($model, 'pass');


                    echo '<button type="submit" name="SignButton" class="btn btn-default">Kayıt Ol</button>';
                    $this->endWidget();
                    ?>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section>