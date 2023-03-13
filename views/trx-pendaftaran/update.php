<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TrxPendaftaran $model */

$this->title = 'Update Data Pendaftaran: ' . $model->no_registrasi;
$this->params['breadcrumbs'][] = ['label' => 'Trx Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_registrasi, 'url' => ['view', 'no_registrasi' => $model->no_registrasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trx-pendaftaran-update">

    <?= $this->render('_form', [
        'model' => $model,
        'jenisRegistrasi' => $jenisRegistrasi,
        'statusRegistrasi' => $statusRegistrasi,
    ]) ?>

</div>