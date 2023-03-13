<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterPelayanan $model */

$this->title = 'Update Data Pelayanan: ' . $model->no_rekam_medis;
$this->params['breadcrumbs'][] = ['label' => 'Master Pelayanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_rekam_medis, 'url' => ['view', 'no_rekam_medis' => $model->no_rekam_medis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-pelayanan-update">


    <?= $this->render('_form', [
        'model' => $model,
        'layanan' => $layanan,
        'jenisPembayaran' => $jenisPembayaran,
    ]) ?>

</div>