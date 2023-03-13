<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\MasterPelayanan $model */

$this->title = $model->no_rekam_medis;
$this->params['breadcrumbs'][] = ['label' => 'Master Pelayanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-pelayanan-view">


    <p>
        <?= Html::a('Update', ['update', 'no_rekam_medis' => $model->no_rekam_medis], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'no_rekam_medis' => $model->no_rekam_medis], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_rekam_medis',
            'layanan',
            'jenis_pembayaran',
            'waktu_mulai',
            'waktu_selesai',
        ],
    ]) ?>

</div>