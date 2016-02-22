<?php

use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;


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
    <body style="padding-top:70px;">
            <?php $this->beginBody(); ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'options' =>[
                    'class'=>'navbar navbar-inverse navbar-fixed-top',
                ],
                'brandLabel' => '<img src="img/logo_small.png"></img>'
            ]);
            
            if(!Yii::$app->user->isGuest): ?>
           <!-- <div class="navbar-form navbar-right">
                <button class = "btn btn-sm btn-default"
                        data-container = "body"
                        data-toggle = "popover"
                        data-trigger ="focus"
                        data-placement ="bottom"
                        data-title ="<?= Yii::$app->user->identity['email']?>"
                        data-content="<ul>
                        <li><a href ='<?= Url::to(['/main/logout']) ?>' data-method='post'>Выход</a></li>
                        <li><a href = '<?= Url::to(['/main/profile']) ?>' data-method='post'>Профиль</a></li>
                        </ul>" >
                  
                    
                    <span class="glyphicon glyphicon-user"></span>
                        </button>
            </div>-->

           <div class="navbar-form navbar-right dropdown">
                   <img src = "img/default/user.png" class="btn"
                        style="padding:0; margin:0;"
                           type="button" id="dropdownMenu1" 
                           data-toggle="dropdown" 
                           aria-haspopup="true" 
                           aria-expanded="true"/>              
                                  
                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                       <li class="dropdown-header" style="font-size:16px"><?= Yii::$app->user->identity['email']?></li>
                       <li role="separator" class="divider"></li>
                       <li><a href="<?= Url::to(['/main/logout']) ?>" data-method="post" >Выход</a></li>  
                       <li><a href="<?= Url::to(['/main/profile']) ?> "data-method="post" >Профиль</a></li>
                       
                   </ul>
               </div>
            <?php  endif;
           /* ActiveForm::begin(
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
            ActiveForm::end();*/

            $menuItems = [
                
                [
                    'label' => 'О системе',
                    'url' => ['#'],
                    'linkOptions' => [
                        'data-toggle' => 'modal',
                        'data-target' => '#modal',
                        'style' => 'cursor:pointer,outline:none'
                    ]
                ],
                ['label' => 'Новости',
                 'url' => ['/news/index'],   
                ],
                 
                ['label' => 'Компании',
                 'url' => ['/comp/index'],   
                ],
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
            

            endif;
            
            echo Nav::widget([

                'items' => $menuItems,
                'encodeLabels' => false,
                'options' => [
                    'class' => 'navbar-nav navbar-right'
                ]
            ]);
            Modal::begin([
                'header' => 'Cистема ART-LABS поставщики v.0.1',
                'id' => 'modal'
            ]);
            echo 'Some text';
            Modal::end();
            NavBar::end();
            ?>
            <div class="container">
                <?php
                echo Breadcrumbs::widget([
                    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
                    'homeLink' => [
                        'label' => 'Главная',
                        'url' => Yii::$app->homeUrl,
                    ],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]);
                ?>
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