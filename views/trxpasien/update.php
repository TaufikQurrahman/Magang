<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Trxpasien $model */

$this->title = 'Update Data Pasien: ' . $model->nama_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Trxpasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pasien, 'url' => ['view', 'id_pasien' => $model->id_pasien]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trxpasien-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>