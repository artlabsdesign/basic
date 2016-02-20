<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Profile;

/**
 * NewsSearch represents the model behind the search form about `app\models\News`.
 */
class CompSearch extends Profile
{
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
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Profile::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'company_site', $this->company_site]);

        return $dataProvider;
    }
}
