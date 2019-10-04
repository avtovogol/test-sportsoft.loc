<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FeedbackMessage */

$this->title = '№ ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Feedback Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="feedback-message-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Yii::$app->user->can('viewAllFeedbackMessage')): ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены что хотите удалить?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>


    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'first_name',
            'last_name',
            'email:email',
            'phone',
            'body:ntext',
        ],
    ]) ?>

</div>
