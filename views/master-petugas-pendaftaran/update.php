<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterPetugasPendaftaran $model */

$this->title = 'Update Data Petugas Pendaftaran: ' . $model->nama_petugas;
$this->params['breadcrumbs'][] = ['label' => 'Master Petugas Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_petugas, 'url' => ['view', 'id_petugas' => $model->id_petugas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-petugas-pendaftaran-update">


    <?= $this->render('_form', [
        'model' => $model,
       
    ]) ?>

</div>