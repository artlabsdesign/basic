<?php

namespace app\controllers;

use Yii;

class MainController extends \yii\web\Controller

{

    public $layout = 'basic';
    public $defaultAction = 'index';

    public function actionIndex()
    {
        $hello = 'Привет!';
        return $this->render('index',
            [
                'hello' => $hello
            ]);
    }

    public function actionSearch()
    {
        $search = Yii::$app->request->post('search');

        return $this->render('search',
            [
                'search' => $search
            ]);
    }

}
