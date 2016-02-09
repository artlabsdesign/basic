<?php
/**
 * Created by PhpStorm.
 * User: Katherina
 * Date: 31.01.2016
 * Time: 15:13
 */
namespace app\models;

use yii\base\Model;
use Yii;
class RegForm extends Model{

    public $email;
    public $password;

    public function rules()
    {
        return[
        [
            ['email','password'], 'required'
            ]
        ];
    }
}