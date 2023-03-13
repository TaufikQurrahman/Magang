<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_petugas_pendaftaran".
 *
 * @property int $id_petugas
 * @property string $nama_petugas
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property string $tanggal_lahir
 * @property string $tempat_lahir
 *
 * @property TrxPendaftaran[] $trxPendaftarans
 */
class MasterPetugasPendaftaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_petugas_pendaftaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_petugas', 'jenis_kelamin', 'alamat', 'tanggal_lahir', 'tempat_lahir'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['nama_petugas', 'jenis_kelamin', 'alamat', 'tempat_lahir'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_petugas' => 'Id Petugas',
            'nama_petugas' => 'Nama Petugas',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tempat_lahir' => 'Tempat Lahir',
        ];
    }

    /**
     * Gets query for [[TrxPendaftarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrxPendaftarans()
    {
        return $this->hasMany(TrxPendaftaran::class, ['id_petugas' => 'id_petugas']);
    }
    public function getTrxPendaftaran()
    {
        return $this->hasOne(TrxPendaftaran::class, ['id_petugas' => 'id_petugas']);
    }
}
