<?php

use app\models\MasterPetugasPendaftaran;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\MasterPetugasPendaftaranSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Petugas Pendaftaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-petugas-pendaftaran-index">


    <p>
        <?= Html::a('Tambah Data Petugas Pendaftaran', ['create'], ['class' => 'btn btn-success']) ?>
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
                'header' => 'Petugas Pendaftaran',
                'attribute' => 'nama_petugas',
                'headerOptions' => ['style' => 'width:200px', 'class' => 'text-center'],
                'value' => function ($model) {
                    return $model->nama_petugas;
                }
            ],
            'jenis_kelamin',
            'alamat',
            [
                'header' => 'Tanggal Lahir',
                'value' => function ($model) {
                    return date("d-M-Y", strtotime($model->tanggal_lahir));
                }
            ],
            // 'id_petugas',
            //'tempat_lahir',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MasterPetugasPendaftaran $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_petugas' => $model->id_petugas]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>