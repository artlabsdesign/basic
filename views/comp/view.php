<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Компании', 'url' => ['/comp/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comp-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <h3>Информация о компании</h3>
    <p><?php if($model->company_site): echo 'Сайт компании: '?><a href = "http://<?= $model->company_site ?>"> <?= $model->company_site ;endif; ?>.</a></p>
    <p>Телефон компании: <?= Html::encode($model->company_phone) ?></p>
    <p>E-mail компании: <?= Html::mailto(Html::encode($model->company_email), Html::encode($model->company_email)) ?></p>
    <p>Адрес компании: <?= Html::encode($model->company_adress) ?></p>
    <p>Специализация: <?= Html::encode($model->company_spec) ?></p>
    <p>Информация о компании: <?= Html::encode($model->company_info) ?></p>
    
    <h3>Контактное лицо</h3>
    <p>Фамилия, Имя: <?= Html::encode($model->contact_name) ?></p>
    <p>Должность: <?= Html::encode($model->contact_job) ?></p>
    <p>Контактный телефон: <?= Html::encode($model->contact_phone) ?></p>
    <p>Контактный e-mail: <?= Html::encode($model->contact_email) ?></p>
    
    <h3>Информация о товарах/услугах</h3>
    <p><?php if($model->product_type): echo 'Наименование продукции/услуг: '.Html::encode($model->product_type);endif; ?></p>
    <p><?= Html::encode($model->product_discont) ?></p>
    <p><?= Html::encode($model->product_srok) ?></p>
  

    
    
    
   
   <?php /* if((!Yii::$app->user->isGuest && Yii::$app->user->id == $model->user_id) || Yii::$app->user->can('admin')): ?>
   
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
 <?php endif; */?>
    
</div>