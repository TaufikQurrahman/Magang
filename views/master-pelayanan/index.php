<?php

use app\models\MasterPelayanan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\MasterPelayananSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Master Pelayanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-pelayanan-index">


    <p>
        <?= Html::a('Tambah Data Pelayanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no_rekam_medis',
            'layanan',
            'jenis_pembayaran',
            'waktu_mulai',
            'waktu_selesai',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MasterPelayanan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'no_rekam_medis' => $model->no_rekam_medis]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>