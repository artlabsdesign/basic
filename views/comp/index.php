<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Компании';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<?php if(Yii::$app->user->can('admin')): 
    
      echo  '<p>'.Html::a('Добавить компанию', ['create'], ['class' => 'btn btn-success']).'</p>'; 
   
	 endif; ?>
    <?php 
    $actionButtons = '{view}';
    if(!Yii::$app->user->isGuest && Yii::$app->user->can('admin')):
        $actionButtons .= ' {update} {delete}';
    endif;
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          
            'company_name',
            'company_site',
            'company_phone',
            'company_email',
            'contact_name',
            'contact_phone',
            'contact_email',

            ['class' => 'yii\grid\ActionColumn','template' => $actionButtons],
        ],
    ]); ?>

</div>



