<?php

echo '<link rel="stylesheet" href="'.Yii::app()->baseUrl.'/css/ornek.css"/>';

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

echo '<div class="form-group">';

echo $form->label($model,'İsim',array('class'=>'control-label col-sm-2'));
echo $form->textField($model,'name',array('class'=>'form-control col-sm-6'));
echo $form->error($model,'name');

echo '</div>';

echo '<div class="form-group">';

echo $form->label($model,'login',array('class'=>'control-label col-sm-2'));
echo $form->textField($model,'login',array('class'=>'form-control col-sm-6'));
echo $form->error($model,'login');

echo '</div>';

echo '<div class="form-group">';

echo $form->label($model,'pass',array('class'=>'control-label col-sm-2'));
echo $form->textField($model,'pass',array('class'=>'form-control col-sm-6'));
echo $form->error($model,'pass');

echo '</div>';

echo CHtml::submitButton('Gönder', array('type'=>'submit','class'=>'button'));


$this->endWidget();

