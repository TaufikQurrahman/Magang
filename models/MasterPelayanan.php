<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_pelayanan".
 *
 * @property int $no_rekam_medis
 * @property string $layanan
 * @property string $jenis_pembayaran
 * @property string $waktu_mulai
 * @property string $waktu_selesai
 *
 * @property TrxPendaftaran[] $trxPendaftarans
 */
class MasterPelayanan extends \yii\db\ActiveRecord
{

    const LAYANAN = ['Poliklinik Umum' => 'Poliklinik Umum', 'Poliklinik Gigi' => 'Poliklinik Gigi', 'Poliklinik Obgyn' => 'Poliklinik Obgyn', 'Poliklinik Mata' => 'Poliklinik Mata', 'UGD' => 'UGD', 'Kelas1' => 'Kelas1', 'Kelas2' => 'Kelas2'];
    const JENIS_PEMBAYARAN = ['Umum' => 'Umum', 'BPJS Kesehatan' => 'BPJS Kesehatan', 'Mandiri Inhealth' => 'Mandiri Inhealth', 'BNI Life' => 'BNI Life'];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_pelayanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['layanan', 'jenis_pembayaran', 'waktu_mulai', 'waktu_selesai'], 'required'],
            [['waktu_mulai', 'waktu_selesai'], 'safe'],
            [['layanan', 'jenis_pembayaran'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_rekam_medis' => 'No Rekam Medis',
            'layanan' => 'Layanan',
            'jenis_pembayaran' => 'Jenis Pembayaran',
            'waktu_mulai' => 'Waktu Mulai',
            'waktu_selesai' => 'Waktu Selesai',
        ];
    }

    /**
     * Gets query for [[TrxPendaftarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrxPendaftarans()
    {
        return $this->hasMany(TrxPendaftaran::class, ['no_rekam_medis' => 'no_rekam_medis']);
    }

    public function getTrxPendaftaran()
    {
        return $this->hasOne(TrxPendaftaran::class, ['no_rekam_medis' => 'no_rekam_medis']);
    }
}