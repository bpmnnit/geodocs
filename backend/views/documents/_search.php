<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DocumentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'document_id') ?>

    <?= $form->field($model, 'document_name') ?>

    <?= $form->field($model, 'document_description') ?>

    <?= $form->field($model, 'document_issue_date') ?>

    <?= $form->field($model, 'document_create_date') ?>

    <?php // echo $form->field($model, 'document_user') ?>

    <?php // echo $form->field($model, 'document_type') ?>

    <?php // echo $form->field($model, 'document_url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
