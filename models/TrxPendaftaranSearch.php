<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrxPendaftaran;

/**
 * TrxPendaftaranSearch represents the model behind the search form of `app\models\TrxPendaftaran`.
 */
class TrxPendaftaranSearch extends TrxPendaftaran
{

    public $nama_pasien;
    public $alamat;
    public $jenis_kelamin;
    public $tanggal_lahir;
    public $nama_petugas;
    public $layanan;
    public $jenis_pembayaran;
    public $waktu_mulai;
    public $waktu_selesai;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_registrasi', 'id_pasien', 'id_petugas', 'no_rekam_medis'], 'integer'],
            [['waktu_registrasi', 'jenis_registrasi', 'status_registrasi', 'nama_pasien', 'alamat', 'jenis_kelamin', 'nama_petugas', 'tanggal_lahir', 'layanan', 'jenis_pembayaran', 'waktu_mulai', 'waktu_selesai'], 'safe'],
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
        $query = TrxPendaftaran::find();
        $query->leftJoin('trx_pasien', 'trx_pendaftaran.id_pasien = trx_pasien.id_pasien');
        $query->leftJoin('master_petugas_pendaftaran', 'trx_pendaftaran.id_petugas = master_petugas_pendaftaran.id_petugas');
        $query->leftJoin('master_pelayanan', 'trx_pendaftaran.no_rekam_medis = master_pelayanan.no_rekam_medis');

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
            'no_registrasi' => $this->no_registrasi,
            'waktu_registrasi' => $this->waktu_registrasi,
            'id_pasien' => $this->id_pasien,
            'id_petugas' => $this->id_petugas,
            'no_rekam_medis' => $this->no_rekam_medis,
        ]);

        $query->andFilterWhere(['like', 'jenis_registrasi', $this->jenis_registrasi])
            ->andFilterWhere(['like', 'status_registrasi', $this->status_registrasi])
            ->andFilterWhere(['like', 'waktu_registrasi', $this->waktu_registrasi])
            ->andFilterWhere(['like', 'trx_pasien.nama_pasien', $this->nama_pasien])
            ->andFilterWhere(['like', 'trx_pasien.jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'trx_pasien.alamat', $this->alamat])
            ->andFilterWhere(['like', 'trx_pasien.tanggal_lahir', $this->tanggal_lahir])
            ->andFilterWhere(['like', 'master_petugas_pendaftaran.nama_petugas', $this->nama_petugas])
            ->andFilterWhere(['like', 'master_pelayanan.layanan', $this->layanan])
            ->andFilterWhere(['like', 'master_pelayanan.jenis_pembayaran', $this->jenis_pembayaran])
            ->andFilterWhere(['like', 'master_pelayanan.waktu_mulai', $this->waktu_mulai])
            ->andFilterWhere(['like', 'master_pelayanan.waktu_selesai', $this->waktu_selesai]);

        return $dataProvider;
    }
}