<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string $avatar
 * @property string $company_name
 * @property string $company_site
 * @property string $company_phone
 * @property string $company_email
 * @property string $company_adress
 * @property integer $company_rod
 * @property string $company_spec
 * @property string $company_info
 * @property string $contact_name
 * @property string $contact_job
 * @property string $contact_phone
 * @property string $contact_email
 * @property string $product_type
 * @property string $product_discont
 * @property integer $product_sklad
 * @property string $product_srok
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_rod', 'product_sklad'], 'integer'],
            [['company_info'], 'string'],
            [['avatar', 'company_name', 'company_site', 'company_adress', 'company_spec', 'contact_name', 'contact_job', 'product_type', 'product_discont', 'product_srok'], 'string', 'max' => 255],
            [['company_phone', 'company_email', 'contact_phone', 'contact_email'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'avatar' => 'Аватар',
            'company_name' => 'Название компании',
            'company_site' => 'Web-сайт компании',
            'company_phone' => 'Телефон',
            'company_email' => 'E-mail компании',
            'company_adress' => 'Адрес офиса, магазина или шоурума',
            'company_rod' => 'Род деятельности компании',
            'company_spec' => 'Основная специализация',
            'company_info' => 'Информация о компании',
            'contact_name' => 'Фамилия,имя',
            'contact_job' => 'Должность',
            'contact_phone' => 'Контактный телефон',
            'contact_email' => 'Контактный E-mail',
            'product_type' => 'Наименование поставляемой продукции/услуг',
            'product_discont' => 'Размер прндоставляемой скидки/комиссии',
            'product_sklad' => 'Наличие продукции на складе',
            'product_srok' => 'Срок поставки/изготовления',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function updateProfile(){
        $profile =($profile = Profile::findOne(Yii::$app->user->id))? $profile: new Profile();
        $profile->user_id = Yii::$app->user->id;
        $profile->company_name = $this->company_name;
        $profile->company_site = $this->company_site;
        $profile->company_phone = $this->company_phone;
        $profile->company_email = $this->company_email;
        $profile->company_adress = $this->company_adress;
        $profile->company_rod = $this->company_rod;
        $profile->company_spec = $this->company_spec;
        $profile->company_info = $this->company_info;
        $profile->contact_name = $this->contact_name;
        $profile->contact_job = $this->contact_job;
        $profile->contact_phone = $this->contact_phone;
        $profile->contact_email = $this->contact_email;
        $profile->product_type = $this->product_type;
        $profile->product_discont = $this->product_discont;
        $profile->product_sklad = $this->product_sklad;
        $profile->product_srok = $this->product_srok;
        return $profile->save() ? true : false;


    }
}
