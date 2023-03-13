<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TrxPendaftaran $model */

$this->title = $model->no_registrasi;
$this->params['breadcrumbs'][] = ['label' => 'Data Pendaftaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trx-pendaftaran-view">

    <p>
        <?= Html::a('Update', ['update', 'no_registrasi' => $model->no_registrasi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'no_registrasi' => $model->no_registrasi], [
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
            'no_registrasi',
            'waktu_registrasi',
            'jenis_registrasi',
            'status_registrasi',
            'id_pasien',
            'id_petugas',
            'no_rekam_medis',
        ],
    ]) ?>

</div>