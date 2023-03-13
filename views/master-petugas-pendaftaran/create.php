<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterPetugasPendaftaran $model */

$this->title = 'Tambah Data Petugas Pendaftaran';
$this->params['breadcrumbs'][] = ['label' => 'Master Petugas Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-petugas-pendaftaran-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>