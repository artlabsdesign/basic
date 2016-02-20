<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form ActiveForm */

$this->title = $model->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Компании', 'url' => ['/comp/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
 <h2>Редактирование профиля компании: <?= Html::encode($model->company_name) ?> </h2>
 
<div class="main-profile">

    <?php $form = ActiveForm::begin(); ?>


   <h3>Информация о компании</h3>
        <?= $form->field($model, 'company_name') ?>
        <?= $form->field($model, 'company_site') ?>
        <?= $form->field($model, 'company_phone') ?>
        <?= $form->field($model, 'company_email') ?>
        <?= $form->field($model, 'company_adress') ?>
        <?= $form->field($model, 'company_spec') ?>
        <?= $form->field($model, 'company_info') ?>
   <h3>Контактное лицо</h3>
        <?= $form->field($model, 'contact_name') ?>
        <?= $form->field($model, 'contact_job') ?>
        <?= $form->field($model, 'contact_phone') ?>
        <?= $form->field($model, 'contact_email') ?>
   <h3>Информация о товарах/услугах</h3>
        <?= $form->field($model, 'product_type') ?>
        <?= $form->field($model, 'product_discont') ?>
        <?= $form->field($model, 'product_srok') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Редактировать', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- main-profile -->
