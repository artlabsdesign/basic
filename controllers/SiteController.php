<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\RegForm;

class MainController extends Controller
{
    public $layout = 'basic';
    public $action = 'index';

    public function ActionIndex(){
        return $this->render('index');
    }
}
