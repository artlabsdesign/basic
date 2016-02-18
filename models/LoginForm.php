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

    private $_user = false;

    

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
            $user = $this->getUser();
            if(!$user || !$user->validatePassword($this->password)):
                $this->addError($attribute, 'Неправильное имя пользователя или пароль');
            endif;
        endif;
    }

    public function getUser(){
        if($this->_user === false):
            $this->_user = User::findByMail($this->email);
            endif;
        return $this->_user;
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
            $this->status = ($user=$this->getUser())?$user->status:User::STATUS_NOT_ACTIVE;
            if($this->status === User::STATUS_ACTIVE):
                return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 :0);
                else:
                return false;
                endif;

        else:
            return false;
        endif;
    }
}