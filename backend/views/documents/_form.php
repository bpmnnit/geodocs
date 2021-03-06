<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Documents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documents-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'document_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'document_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'document_issue_date')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
        ]
    ]);?>

    <?= $form->field($model, 'document_user')->textInput() ?>

    <?= $form->field($model, 'document_type')->dropDownList([ 'DO LETTER' => 'DO LETTER', 'ANNUAL REPORT' => 'ANNUAL REPORT', 'MONTHLY REPORT' => 'MONTHLY REPORT', 'ACQUISITION REPORT' => 'ACQUISITION REPORT', 'PROCESSING REPORT' => 'PROCESSING REPORT', 'ORGANOGRAM' => 'ORGANOGRAM', ], ['prompt' => 'Document Type']) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
