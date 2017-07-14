<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Documents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'document_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'document_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'document_issue_date')->textInput() ?>

    <?= $form->field($model, 'document_user')->textInput() ?>

    <?= $form->field($model, 'document_type')->dropDownList([ 'DO LETTER' => 'DO LETTER', 'ANNUAL REPORT' => 'ANNUAL REPORT', 'MONTHLY REPORT' => 'MONTHLY REPORT', 'ACQUISITION REPORT' => 'ACQUISITION REPORT', 'PROCESSING REPORT' => 'PROCESSING REPORT', 'ORGANOGRAM' => 'ORGANOGRAM', ], ['prompt' => 'Document Type']) ?>

    <?= $form->field($model, 'document_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
