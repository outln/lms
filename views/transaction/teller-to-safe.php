<?php

use app\models\Account;
use app\utils\widgets\AccountIDView;
use app\utils\widgets\AccountView;
use kartik\form\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\ManualTransaction */
/* @var $userItems array() */

$this->title = 'Teller to safe';
$this->params['breadcrumbs'][] = ['label' => 'Teller', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    if ($model->error != null && $model->error != '') {
        echo Alert::widget([
            'options' => [
                'class' => 'alert-danger',
            ],
            'body' => '<b>Error:</b> ' . $model->error,
        ]);
    }
    ?>

    <?php if ($model->stage == 1) { ?>
        <?php $form = ActiveForm::begin(['id' => 'frmx', 'type' => ActiveForm::TYPE_HORIZONTAL]); ?>



        <?= DetailView::widget([
            'model' => $model,
            'template' => '<tr><td style="width: 1%;white-space:nowrap;">{label}</td><td>{value}</td></tr>',
            'attributes' => [
                ['attribute' => 'dr_account', 'format' => 'html', 'value' => AccountView::widget(['accountId' => $model->dr_account]) . " : " . Account::findOne($model->dr_account)->getAccountName()],
                ['attribute' => 'cr_account', 'format' => 'html', 'value' => AccountView::widget(['accountId' => Account::createAccountId(Account::TYPE_TELLER, $model->cr_account)]) . " : " . Account::findOne(Account::createAccountId(Account::TYPE_TELLER, $model->cr_account))->getAccountName()],
                'payment',
                'cheque',
                ['attribute' => 'amount', 'value' => number_format($model->amount, 2)],
                'description',
            ],
        ]) ?>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <?= Html::a('Back', "#", ['class' => 'btn btn-success', 'id' => 'grr']) ?>
                <?= Html::submitButton('Confirm', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <?= $form->field($model, 'stage')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'link')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'dr_account')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'cr_account')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'payment')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'cheque')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'amount')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'description')->hiddenInput()->label(false) ?>

        <?php ActiveForm::end(); ?>
    <?php } ?>

    <?php if ($model->stage == 0) { ?>
        <div class="supplier-form">

            <?php $form = ActiveForm::begin(['id' => 'frmx', 'type' => ActiveForm::TYPE_HORIZONTAL]); ?>

            <?= $form->field($model, 'cr_account')->dropDownList($userItems)->label("Teller account") ?>
            <?= $form->field($model, 'amount')->textInput(['type' => 'number', 'maxlength' => true, 'step' => '0.01']) ?>
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <?= $form->field($model, 'cheque')->hiddenInput()->label(false) ?>
            <?= $form->field($model, 'stage')->hiddenInput()->label(false) ?>
            <?= $form->field($model, 'link')->hiddenInput()->label(false) ?>
            <?= $form->field($model, 'dr_account')->hiddenInput()->label(false) ?>
            <?= $form->field($model, 'payment')->hiddenInput()->label(false) ?>
            <?php ActiveForm::end(); ?>

        </div>
    <?php } ?>
</div>

<?php
$this->registerJs("
$('#grr').click(function(e){
    e.preventDefault();
    $('#manualtransaction-stage').val(4);
    $('#frmx').attr('action', '" . \yii\helpers\Url::to(['transaction/teller-to-safe']) . "').submit();
    
});
")
?>
