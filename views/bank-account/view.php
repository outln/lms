<?php

use app\models\Bank;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BankAccount */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bank Accounts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-account-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><td style="width: 1%;white-space:nowrap;">{label}</td><td>{value}</td></tr>',
        'attributes' => [
            'id',
            ['attribute' => 'bank', 'value' => Bank::findOne($model->bank)->name],
            'bank_account_id',
            ['attribute' => 'account_id', 'format' => 'html', 'value' => \app\utils\widgets\AccountIDView::widget(['accountId' => $model->account_id])],
            'description:ntext',
        ],
    ]) ?>

</div>
