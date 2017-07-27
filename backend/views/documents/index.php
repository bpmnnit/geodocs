<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DocumentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Documents', ['value' => Url::to('index.php?r=documents/create'), 'class' => 'btn btn-success', 'id' => 'documentModalButton']) ?>
    </p>

    <?php
        Modal::begin([
           'header' => '<h1>Documents</h1>',
            'id' => 'documentModal',
            'size' => 'modal-md',
        ]);

        echo "<div id='documentModalContent'></div>";

        Modal::end();
    ?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'document_id',
            [
                'attribute' => 'document_name',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->document_name, ['documents/download', 'id' => $model->document_id], ['data-pjax' => '0']);
                }
            ],
            //'document_description:ntext',
            [
                'attribute' => 'document_issue_date',
                'value' => 'document_issue_date',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'document_issue_date',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-d',
                    ]
                ]),
            ],
            //'document_create_date',
            // 'document_user',
            'document_type',
            [
                'attribute' => 'document_user',
                'value' => 'documentUser.name',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
