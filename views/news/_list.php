
<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\BaseStringHelper;
?>

<h3><?= Html::encode($model->news_header)?></h3>


<p><?= BaseStringHelper::truncate(Html::encode($model->news_text), 300) ?></p>

<?= Html::a('Читать далее', ['/news/view', 'id'=>$model->id], ['class' => 'btn btn-default', 'role' => 'button','style'=> 'margin-right:10px;'])?>
<?php if((!Yii::$app->user->isGuest && Yii::$app->user->id == $model->user_id) || Yii::$app->user->can('admin')):
    

echo Html::a('Изменить', ['/news/update','id'=>$model->id], ['class' => 'btn btn-success', 'role' => 'button','style'=> 'margin-right:10px;']);
echo Html::a('Удалить', ['/news/delete','id'=>$model->id], ['class' => 'btn btn-danger', 'data-method'=> 'post', 'role' => 'button','style'=> 'margin-right:10px;']);

endif; 
?>







