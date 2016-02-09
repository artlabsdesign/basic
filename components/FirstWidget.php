<?php
/**
 * Created by PhpStorm.
 * User: Katherina
 * Date: 31.01.2016
 * Time: 16:51
 */
namespace app\components;
use yii\base\Widget;


class FirstWidget extends Widget{

    public $a;
    public $b;

    public function init(){

        parent::init();
    if($this->a === null){
        $this->a = 0;
    }
    if($this->b === null){
        $this->b = 0;
    }

}
public function run(){
    $c = $this->a + $this->b;

    return $this->render('first', ['c' => $c]);
}
}