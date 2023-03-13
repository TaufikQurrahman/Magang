<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterPelayanan $model */

$this->title = 'Tambah Data Pelayanan Pelayanan';
$this->params['breadcrumbs'][] = ['label' => 'Master Pelayanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-pelayanan-create">

    <?= $this->render('_form', [
        'model' => $model,
        'layanan' => $layanan,
        'jenisPembayaran' => $jenisPembayaran,
    ]) ?>

</div>