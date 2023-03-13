<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property int $status
 * @property string $role
 * @property int $id_petugas
 * @property string $time_create
 * @property string $time_update
 *
 * @property MasterPetugasPendaftaran $petugas
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accessToken', 'status', 'role', 'id_petugas', 'time_create', 'time_update'], 'required'],
            [['status', 'id_petugas'], 'integer'],
            [['time_create', 'time_update'], 'safe'],
            [['username', 'password', 'role'], 'string', 'max' => 60],
            [['authKey', 'accessToken'], 'string', 'max' => 100],
            [['id_petugas'], 'exist', 'skipOnError' => true, 'targetClass' => MasterPetugasPendaftaran::class, 'targetAttribute' => ['id_petugas' => 'id_petugas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'status' => 'Status',
            'role' => 'Role',
            'id_petugas' => 'Id Petugas',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
        ];
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
}
