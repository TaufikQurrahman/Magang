<?php

use app\models\Trxpasien;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\TrxpasienSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Pasien';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trxpasien-index">

    <p>
        <?= Html::a('Tambah Data Pasien', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'nama_pasien',
            [
                'attribute' => 'nama_pasien',
                'value' => function ($model) {
                    return $model->nama_pasien;
                }
            ],
            'jenis_kelamin',
            'alamat',
            [
                'attribute' => 'tanggal_lahir',
                'value' => function ($model) {
                    return date("d-M-Y", strtotime($model->tanggal_lahir));
                }
            ],
            // 'tanggal_lahir',

            // 'id_pasien',
            //'tempat_lahir',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Trxpasien $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pasien' => $model->id_pasien]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>