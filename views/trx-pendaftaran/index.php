<?php

use app\models\TrxPendaftaran;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\TrxPendaftaranSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Pendaftaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trx-pendaftaran-index">

    <p>
        <?= Html::a('Tambah Data Pendaftaran', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export to PDF', Url::to(['pdf']), ['class' => 'btn btn-danger']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'header' => 'Waktu Registrasi',
                'value' => function ($model) {
                    return date("d-M-Y H:i:s", strtotime($model->waktu_registrasi));
                }
            ],
            'no_registrasi',
            [
                'header' => 'No Rekam Medis',
                'attribute' => 'no_rekam_medis',
                'value' => function ($model) {
                    return $model->pelayanan->no_rekam_medis;
                }
            ],
            [
                'attribute' => 'nama_pasien',
                'value' => function ($model) {
                    return $model->pasien->nama_pasien;
                }
            ],
            [
                'attribute' => 'jenis_kelamin',
                'value' => function ($model) {
                    return $model->pasien->jenis_kelamin;
                }
            ],
            [
                'attribute' => 'tanggal_lahir',
                'value' => function ($model) {
                    return date("d-M-Y", strtotime($model->pasien->tanggal_lahir));
                }
            ],
            'jenis_registrasi',
            [
                'attribute' => 'layanan',
                'value' => function ($model) {
                    return $model->pelayanan->layanan;
                }

            ],

            [
                'attribute' => 'jenis_pembayaran',
                'value' => function ($model) {
                    return $model->pelayanan->jenis_pembayaran;
                }

            ],
            'status_registrasi',
            [
                'header' => 'Waktu Mulai Pelayanan',
                'attribute' => 'waktu_mulai',
                'value' => function ($model) {
                    return date("d-M-Y H:i:s", strtotime($model->pelayanan->waktu_mulai));
                }

            ],
            [
                'header' => 'Waktu Selesai Pelayanan',
                'attribute' => 'waktu_selesai',
                'value' => function ($model) {
                    return date("d-M-Y H:i:s", strtotime($model->pelayanan->waktu_selesai));
                }

            ],
            // [
            //     'attribute' => 'alamat',
            //     'value' => function ($model) {
            //         return $model->pasien->alamat;
            //     }

            // ],
            // 'waktu_registrasi',

            [
                'header' => 'Petugas Pendaftaran',
                'attribute' => 'nama_petugas',
                'value' => function ($model) {
                    return $model->petugas->nama_petugas;
                }
            ],
            // 'id_pasien',
            //'id_petugas',
            //'no_rekam_medis',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TrxPendaftaran $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'no_registrasi' => $model->no_registrasi]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>