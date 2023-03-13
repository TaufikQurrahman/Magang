<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;



/** @var yii\web\View $this */
/** @var app\models\TrxPendaftaran $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="x_panel">
    <div class="x_title">
        <h2>Identitas Pendaftaran</h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br>
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'waktu_registrasi')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Pilih tanggal ...'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd H:i:s'
                    ]
                ]); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'jenis_registrasi')->widget(Select2::classname(), [
                    'data' => $jenisRegistrasi,
                    'options' => ['placeholder' => 'Pilih ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'status_registrasi')->widget(Select2::classname(), [
                    'data' => $statusRegistrasi,
                    'options' => ['placeholder' => 'Pilih ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-2">
                <?= $form->field($model, 'id_pasien')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'id_petugas')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'no_rekam_medis')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="ln_solid"></div>
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

</div>