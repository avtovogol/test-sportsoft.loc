<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FeedbackMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сообщения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-message-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'options' => ['style' => 'width: 5%'],
                'visible' => Yii::$app->user->can('viewAllFeedbackMessages'),
//                'visible' => true,
            ],
            [
                'attribute' => 'user_id',
                'options' => ['style' => 'width: 5%'],
                'visible' => Yii::$app->user->can('viewAllFeedbackMessages'),
            ],
            [
                'attribute' => 'first_name',
                'options' => ['style' => 'width: 15%'],
            ],
            [
                'attribute' => 'last_name',
                'options' => ['style' => 'width: 15%'],
            ],
            [
                'attribute' => 'email',
                'format' => 'email',
                'options' => ['style' => 'width: 15%'],
            ],
            [
                'attribute' => 'phone',
                'format' => 'raw',
                'options' => ['style' => 'width: 15%'],
            ],
            [
                'attribute' => 'body',
                'format' => 'ntext',
                'options' => ['style' => 'width: 35%'],
            ],

            ['class' => 'yii\grid\ActionColumn',

                'template' => '{view}  {delete}',
                'visibleButtons' => [
                    'delete' => Yii::$app->user->can('deleteFeedbackMessage'),
                ]],
        ],
    ]); ?>


</div>
