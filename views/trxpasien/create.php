<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Trxpasien $model */

$this->title = 'Tambah Data Pasien';
$this->params['breadcrumbs'][] = ['label' => 'Trxpasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trxpasien-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>