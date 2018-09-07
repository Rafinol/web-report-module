<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мероприятия';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index wd">
    <h1>Отчеты</h1><br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'open_date' => [
                'label' => 'Дата начала',
                'value' => function ($model) {
                    return \shop\helpers\Hdate::StamptoDate($model->SDate);
                },
            ],
            'close_date' => [
                'label' => 'Дата конца',
                'value' => function ($model) {
                    return \shop\helpers\Hdate::StamptoDate($model->EDate);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{report} ',
                'buttons' => [
                    'report' => function ($url, $model) {
                        return Html::a(
                            'Отчет',
                            yii\helpers\Url::to(['event', 'id' => $model->id]),
                            ['class' => 'btn btn-info btn-xs',]
                        );
                    },
                ],
            ],
        ],
    ]); ?>
</div>
