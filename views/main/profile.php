<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form ActiveForm */
?>
<div class="main-profile">

    <?php $form = ActiveForm::begin(); ?>



        <?= $form->field($model, 'company_name') ?>
        <?= $form->field($model, 'company_site') ?>
        <?= $form->field($model, 'company_phone') ?>
        <?= $form->field($model, 'company_email') ?>
        <?= $form->field($model, 'company_adress') ?>
        <?= $form->field($model, 'company_spec') ?>
        <?= $form->field($model, 'company_info') ?>
        <?= $form->field($model, 'contact_name') ?>
        <?= $form->field($model, 'contact_job') ?>
        <?= $form->field($model, 'contact_phone') ?>
        <?= $form->field($model, 'contact_email') ?>
        <?= $form->field($model, 'product_type') ?>
        <?= $form->field($model, 'product_discont') ?>
        <?= $form->field($model, 'product_srok') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Редактировать', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- main-profile -->
