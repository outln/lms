<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><td style="width: 1%;white-space:nowrap;">{label}</td><td>{value}</td></tr>',
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
