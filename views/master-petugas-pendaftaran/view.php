<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\MasterPetugasPendaftaran $model */

$this->title = $model->id_petugas;
$this->params['breadcrumbs'][] = ['label' => 'Data Petugas Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="master-petugas-pendaftaran-view">

    <p>
        <?= Html::a('Update', ['update', 'id_petugas' => $model->id_petugas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_petugas' => $model->id_petugas], [
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
            'id_petugas',
            'nama_petugas',
            'jenis_kelamin',
            'alamat',
            'tanggal_lahir',
            'tempat_lahir',
        ],
    ]) ?>

</div>