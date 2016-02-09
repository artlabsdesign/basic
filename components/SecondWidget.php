<?php
/**
 * Created by PhpStorm.
 * User: Katherina
 * Date: 31.01.2016
 * Time: 16:51
 */
namespace app\components;
use yii\base\Widget;


class SecondWidget extends Widget{



    public function init(){

        parent::init();
        ob_start();



    }
    public function run(){

        $content = ob_get_clean();
        return $this->render('second', ['content' => $content]);
    }
}