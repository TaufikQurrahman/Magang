<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TrxPendaftaranSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trx-pendaftaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'no_registrasi') ?>

    <?= $form->field($model, 'waktu_registrasi') ?>

    <?= $form->field($model, 'jenis_registrasi') ?>

    <?= $form->field($model, 'status_registrasi') ?>

    <?= $form->field($model, 'id_pasien') ?>

    
    <?php // echo $form->field($model, 'id_petugas') ?>
    
    <?= $form->field($model, 'no_rekam_medis') ?>
    
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
