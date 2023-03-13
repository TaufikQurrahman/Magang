<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TrxPendaftaran $model */

$this->title = 'Tambah Data Pendaftaran';
$this->params['breadcrumbs'][] = ['label' => 'Trx Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trx-pendaftaran-create">

    <?= $this->render('_form', [
        'model' => $model,
        'jenisRegistrasi' => $jenisRegistrasi,
        'statusRegistrasi' => $statusRegistrasi,
    ]) ?>

</div>