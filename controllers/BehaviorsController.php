<?php
/**
 * Created by PhpStorm.
 * User: s.kostyukovich
 * Date: 2/13/2016
 * Time: 5:11 PM
 */
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class BehaviorsController extends Controller{

    public function behaviors()
    {
        return [
            'access'=>[
                'class'=> AccessControl::className(),
                'rules'=>[
                    [
                        'allow'=>true,
                        'controllers'=> ['main'],
                        'actions' => ['reg','login'],
                        'verbs' =>['GET','POST'],
                        'roles' => ['?']
                    ],
                    [
                        'allow'=>true,
                        'controllers'=> ['main'],
                        'actions' => ['profile'],
                        'verbs' =>['GET','POST'],
                        'roles' => ['@']
                    ],
                    [
                        'allow'=>true,
                        'controllers'=> ['main'],
                        'actions' => ['logout'],
                        'verbs' =>['POST'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','search']
                    ]
                ]
            ]

        ];
    }

}