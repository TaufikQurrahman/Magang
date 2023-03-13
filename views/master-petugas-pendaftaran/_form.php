<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;


/** @var yii\web\View $this */
/** @var app\models\MasterPetugasPendaftaran $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="x_panel">
    <div class="x_title">
        <h2>Identitas Petugas</h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br>
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'nama_petugas')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'jenis_kelamin')->radioList(['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], [
                    'item' => function ($index, $label, $name, $checked, $value) {
                        return '<label style="margin-right:30px";><input type="radio" class="flat" name="' . $name . '" value="' . $value . '" ' . ($checked ? "checked" : "") . '> ' . $label . '</label>';
                    }
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'alamat')->textarea(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Pilih tanggal ...'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

</div>