<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Regions */

$this->title = 'Update Regions: ' . $model->region_id;
$this->params['breadcrumbs'][] = ['label' => 'Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->region_id, 'url' => ['view', 'id' => $model->region_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="regions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
