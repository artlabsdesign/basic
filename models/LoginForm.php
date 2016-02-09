<?php
/**
 * Created by PhpStorm.
 * User: Katherina
 * Date: 31.01.2016
 * Time: 15:12
 */
namespace app\models;

use yii\base\Model;
use Yii;
class LoginForm extends Model
{

    public $email;
    public $password;

    public function rules()
    {
        return [
            [
                ['email', 'password'], 'required'
            ]
        ];
    }
}