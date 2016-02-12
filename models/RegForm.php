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
    public $status;

    public function rules()
    {
        return[
            [['email', 'password'],'filter','filter'=>'trim'],
            [['email','password'], 'required'],
            ['password','string','min'=> 6, 'max'=> 255],
            ['email','unique','targetClass'=>User::className(),'message'=>'Этот e-mail уже используется, выберите другой!'],
            ['email','email'],
            ['status','default', 'value'=>User::STATUS_ACTIVE, 'on'=>'default'],
            ['status','in','range'=>[User::STATUS_NOT_ACTIVE, User::STATUS_ACTIVE]],
            
        
        ];
    }
    public function attributeLabels()
    {
        return [
        'email' => 'E-mail',
        'password' => 'Пароль'
         ];
    }
    
    public function reg(){
        $user = new User();
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
        
        
    }
}