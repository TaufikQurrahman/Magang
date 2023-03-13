<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trx_pasien".
 *
 * @property int $id_pasien
 * @property string $nama_pasien
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property string $tanggal_lahir
 * @property string $tempat_lahir
 *
 * @property MasterPelayanan[] $masterPelayanans
 * @property TrxPendaftaran[] $trxPendaftarans
 */
class TrxPasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trx_pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pasien', 'jenis_kelamin', 'alamat', 'tanggal_lahir', 'tempat_lahir'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['nama_pasien', 'jenis_kelamin', 'alamat', 'tempat_lahir'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pasien' => 'Id Pasien',
            'nama_pasien' => 'Nama Pasien',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tempat_lahir' => 'Tempat Lahir',
        ];
    }

    /**
     * Gets query for [[MasterPelayanans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMasterPelayanans()
    {
        return $this->hasMany(MasterPelayanan::class, ['id_pasien' => 'id_pasien']);
    }
    public function getMasterPelayanan()
    {
        return $this->hasOne(MasterPelayanan::class, ['id_pasien' => 'id_pasien']);
    }

    /**
     * Gets query for [[TrxPendaftarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrxPendaftarans()
    {
        return $this->hasMany(TrxPendaftaran::class, ['id_pasien' => 'id_pasien']);
    }
    
    public function getTrxPendaftaran()
    {
        return $this->hasOne(TrxPendaftaran::class, ['id_pasien' => 'id_pasien']);
    }
}