<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $email
 * @property string $password_hash
 * @property integer $status
 * @property string $auth_key
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    
    const STATUS_DELETED = 0;
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 10;
    public $password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email','password'],'filter','filter'=>'trim'],
            [['email','status'],'required'],
            ['email','email'],
            ['password','required','on'=>'create'],
            ['email','unique','message'=>'Этот e-mail уже используется']
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password Hash',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /* Behaviors */
    
    public function behaviors() {
        return 
        [
        TimestampBehavior::className()
        ];
    }
    
    /* Find */
    
    public static function findByMail($email){
        return static::findOne([
            'email' => $email
            ]);
    }


    /* Helpers */
    
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
        
    }
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
                
    }
    
    public function validatePassword($password) {
        
        return Yii::$app->security->validatePassword($password, $this->password_hash);
        
    }
    /* User auth */
    
    public static function findIdentity($id)
    {
        return static::findOne([
           'id' => $id, 'status' => self::STATUS_ACTIVE 
            
        ]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
}
