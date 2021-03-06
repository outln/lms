<?php

use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use Zelenin\yii\SemanticUI\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $schedule \app\utils\loan\AmortizationSchedule */

$this->title = "Schedule";
$this->params['breadcrumbs'][] = ['label' => 'Loans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div style="max-width: 300px">
        <?= DetailView::widget([
            'model' => $schedule,
            'template' => '<tr><td style="width: 1%;white-space:nowrap;">{label}</td><td>{value}</td></tr>',
            'attributes' => [
                ['attribute' => "amount", 'contentOptions' => array('style' => 'text-align: right;'), 'format' => ['decimal', 2]],
                ['attribute' => "payment", 'contentOptions' => array('style' => 'text-align: right;'), 'format' => ['decimal', 2]],
                ['attribute' => "totalInterest", 'contentOptions' => array('style' => 'text-align: right;'), 'format' => ['decimal', 2]],
                ['attribute' => "totalPayment", 'contentOptions' => array('style' => 'text-align: right;'), 'format' => ['decimal', 2]],
                ['attribute' => "charges", 'contentOptions' => array('style' => 'text-align: right;'), 'format' => ['decimal', 2]],
                ['attribute' => "terms", 'contentOptions' => array('style' => 'text-align: right;')],
                ['attribute' => "payment", 'contentOptions' => array('style' => 'text-align: right;'), 'format' => ['decimal', 2]],
            ],
        ]) ?>
    </div>
    <?php Pjax::begin(); ?>  <?= GridView::widget([
        'dataProvider' => new ArrayDataProvider([
            'allModels' => $schedule->schedule,
            'pagination' => ['pageSize' => 12],
        ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => "Amount", 'value' => 'amount', 'contentOptions' => array('style' => 'text-align: right;'), 'format' => ['decimal', 2]],
            ['attribute' => "Interest", 'value' => 'interest', 'contentOptions' => array('style' => 'text-align: right;'), 'format' => ['decimal', 2]],
            ['attribute' => "Principal", 'value' => 'principal', 'contentOptions' => array('style' => 'text-align: right;'), 'format' => ['decimal', 2]],
            ['attribute' => "Charges", 'value' => 'charges', 'contentOptions' => array('style' => 'text-align: right;'), 'format' => ['decimal', 2]],
            ['attribute' => "Balance", 'value' => 'balance', 'contentOptions' => array('style' => 'text-align: right;'), 'format' => ['decimal', 2]],
        ]
    ]) ?><?php Pjax::end(); ?>


</div>
