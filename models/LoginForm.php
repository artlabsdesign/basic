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
    public $status;
    public $rememberMe = true;
    

    public function rules()
    {
        return [
            [['email', 'password'], 'required', 'on'=>'default'],
            ['email','email'],
            ['rememberMe', 'boolean'],
            ['password','validatePassword']
        ];
    }
    
    public function validatePassword($attribute) {
        if(!$this->hasErrors()):
            if($this->password != '1234'):
                $this->addError($attribute, 'Неправильное имя пользователя или пароль');
            endif;
        endif;
    }

    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня'
            
        ];
    }
    
    public function login() {
        if($this->validate()):
            return true;
        else:
            return false;
        endif;
    }
}