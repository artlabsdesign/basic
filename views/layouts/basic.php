<?php

use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\bootstrap\Navbar;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: Katherinao
 * Date: 31.01.2016
 * Time: 15:52
 */
AppAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang ="<?= Yii::$app->language ?>">
    <head>
        <?= Html::csrfMetaTags() ?>
        <meta charset="<?= Yii::$app->charset ?>">
        <?php $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']); ?>
        <title><?= Yii::$app->name ?></title>
        <?php $this->head(); ?>
    </head>
    <body>
            <?php $this->beginBody(); ?>
        <div class="wrap">
            <?php
            Navbar::begin([
                'brandLabel' => 'Тестовое приложение'
            ]);
            ActiveForm::begin(
                    [
                        'action' => ['/main/search'],
                        'method' => 'post',
                        'options' => [
                            'class' => 'navbar-form navbar-right'
                        ]
                    ]
            );
            echo '<div class="input-group input-group-sm">';
            echo Html::input(
                    'type:text', 'search', '', [
                'placeholder' => 'Найти...',
                'class' => 'form-control'
                    ]
            );
            echo '<span class="input-group-btn">';
            echo Html::submitButton(
                    '<span class = "glyphicon glyphicon-search"></span>', [
                'class' => 'btn btn-success'
                    ]
            );
            echo '</span></div>';
            ActiveForm::end();

            $menuItems = [
                [
                    'label' => 'Главная <span class="glyphicon glyphicon-home"></span>',
                    'url' => ['/main/index']
                ],
                [
                    'label' => 'О проекте <span class ="glyphicon glyphicon-question-sign"></span>',
                    'url' => ['#'],
                    'linkOptions' => [
                        'data-toggle' => 'modal',
                        'data-target' => '#modal',
                        'style' => 'cursor:pointer,outline:none'
                    ]
                ],
                ['label' => 'Выпадающий пункт',
                    'items' => [
                        '<li class ="dropdown-header">Заголовок</li>',
                        '<li class = "divider"></li>',
                        [
                            'label' => 'Ссылка',
                            'url' => '#'
                        ]
                    ]
                ]
            ];

            if(Yii::$app->user->isGuest):
                $menuItems[] = [
                        'label' => 'Регистрация',
                        'url' => ['/main/reg']
                    ];
            $menuItems[] = [
                        'label' => 'Вход',
                        'url' => ['/main/login']
                    ];
            else:
                $menuItems[] = [
                    'label' => 'Выйти('.Yii::$app->user->identity['email'].')',
                    'url' => ['/main/logout'],
                    'linkOptions' => ['data-method'=>'post']
                            ];
            endif;
            
            echo Nav::widget([

                'items' => $menuItems,
                'encodeLabels' => false,
                'options' => [
                    'class' => 'navbar-nav navbar-right'
                ]
            ]);
            Modal::begin([
                'header' => 'Header',
                'id' => 'modal'
            ]);
            echo 'Some text';
            Modal::end();
            NavBar::end();
            ?>
            <div class="container">
            <?= $content ?>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <span class="badge">
                    <span class = "glyphicon glyphicon-copyright-mark"></span> ART-LABS interiors<?= date('Y') ?>
                </span>

            </div>
        </footer>

<?php $this->endBody(); ?>
    </body>

</html>
<?php $this->endPage(); ?>