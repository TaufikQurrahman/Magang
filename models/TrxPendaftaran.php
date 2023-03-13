<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trx_pendaftaran".
 *
 * @property int $no_registrasi
 * @property string $waktu_registrasi
 * @property string $jenis_registrasi
 * @property string $status_registrasi
 * @property int $id_pasien
 * @property int $id_petugas
 *
 * @property TrxPasien $pasien
 * @property MasterPetugasPendaftaran $petugas
 */
class TrxPendaftaran extends \yii\db\ActiveRecord
{

    const JENIS_REGISTRASI = ['Rawat Jalan' => 'Rawat Jalan', 'Rawat Inap' => 'Rawat Inap', 'UGD' => 'UGD'];
    const STATUS_REGISTRASI = ['Tutup Kunjungan' => 'Tutup Kunjungan', 'Aktif' => 'Aktif'];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trx_pendaftaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['waktu_registrasi', 'jenis_registrasi', 'status_registrasi', 'id_pasien', 'id_petugas', 'no_rekam_medis'], 'required'],
            [['waktu_registrasi'], 'safe'],
            [['id_pasien', 'id_petugas', 'no_rekam_medis'], 'integer'],
            [['jenis_registrasi', 'status_registrasi'], 'string', 'max' => 120],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => TrxPasien::class, 'targetAttribute' => ['id_pasien' => 'id_pasien']],
            [['id_petugas'], 'exist', 'skipOnError' => true, 'targetClass' => MasterPetugasPendaftaran::class, 'targetAttribute' => ['id_petugas' => 'id_petugas']],
            [['no_rekam_medis'], 'exist', 'skipOnError' => true, 'targetClass' => MasterPelayanan::class, 'targetAttribute' => ['no_rekam_medis' => 'no_rekam_medis']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_registrasi' => 'No Registrasi',
            'waktu_registrasi' => 'Waktu Registrasi',
            'jenis_registrasi' => 'Jenis Registrasi',
            'status_registrasi' => 'Status Registrasi',
            'id_pasien' => 'Id Pasien',
            'id_petugas' => 'Id Petugas',
            'no_rekam_medis' => 'Nomor Rekam Medis',
        ];
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(TrxPasien::class, ['id_pasien' => 'id_pasien']);
    }

    /**
     * Gets query for [[Petugas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPetugas()
    {
        return $this->hasOne(MasterPetugasPendaftaran::class, ['id_petugas' => 'id_petugas']);
    }


    public function getPelayanan()
    {
        return $this->hasOne(MasterPelayanan::class, ['no_rekam_medis' => 'no_rekam_medis']);
    }
}
