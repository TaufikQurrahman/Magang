<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MasterPelayanan;

/**
 * MasterPelayananSearch represents the model behind the search form of `app\models\MasterPelayanan`.
 */
class MasterPelayananSearch extends MasterPelayanan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rekam_medis'], 'integer'],
            [['layanan', 'jenis_pembayaran', 'waktu_mulai', 'waktu_selesai'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = MasterPelayanan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'no_rekam_medis' => $this->no_rekam_medis,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
        ]);

        $query->andFilterWhere(['like', 'layanan', $this->layanan])
            ->andFilterWhere(['like', 'jenis_pembayaran', $this->jenis_pembayaran]);

        return $dataProvider;
    }
}
