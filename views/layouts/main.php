<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    $options = [
        'class' => 'navbar-inverse navbar-fixed-top',
    ];

    $day = \app\models\Setting::getDay();
    $today = date("Y-m-d");
    if ($day < $today) {
        $options['style'] = 'background-color:	#8B0000';
    } else if ($day >$today) {
        $options['style'] = 'background-color:	#137113';
    }

    NavBar::begin([
        'brandLabel' => \app\utils\Settings::brandLabel(),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => $options,
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => 'Teller',
                'items' =>
                    [
                        ['label' => 'Receipt', 'url' => ['/teller/receipt']],
                        ['label' => 'Down Payment Receipt', 'url' => ['/teller/down-payment-receipt']],
                        ['label' => 'Expense Payment', 'url' => ['/teller/expense-payment']],
                        ['label' => 'Expense Receipt', 'url' => ['/teller/expense-receipt']]
                    ]
            ],
            [
                'label' => 'Partners',
                'items' => [
                    ['label' => 'Customers', 'url' => ['/customer/index']],
                    ['label' => 'Suppliers', 'url' => ['/supplier/index']],
                    ['label' => 'Canvassers', 'url' => ['/canvasser/index']],
                    ['label' => 'Collectors', 'url' => ['/collector/index']],
                ]
            ],
            [
                'label' => 'Loans',
                'items' => [
                    ['label' => 'Create', 'url' => ['/loan/create']],
                    ['label' => 'View', 'url' => ['/loan/index', 'sort' => '-id']],
                    ['label' => 'Payment', 'url' => ['/teller/payment']],
                    ['label' => 'Sales Commission Payment', 'url' => ['/teller/sc-payment']],
                    ['label' => 'Canvassing Commission Payment', 'url' => ['/teller/cc-payment']],
                    ['label' => 'Charges Payment', 'url' => ['/teller/oc-payment']],
                    ['label' => 'RMV Charges Payment', 'url' => ['/teller/rmvc-payment']],
                    ['label' => 'Collector Assign', 'url' => ['/loan/assign-collectors']],
                    ['label' => 'Collections', 'url' => ['/collection/index']],
                ]
            ],
            [
                'label' => 'Transaction',
                'items' => [
                    ['label' => 'Manual Transaction', 'url' => ['/transaction/manual']],
                    ['label' => 'Investment', 'url' => ['/transaction/investment']],
                    ['label' => 'Safe -> Teller', 'url' => ['/transaction/safe-to-teller']],
                    ['label' => 'Teller -> Safe', 'url' => ['/transaction/teller-to-safe']],
                    ['label' => 'Safe -> Bank', 'url' => ['/transaction/safe-to-bank']],
                    ['label' => 'Bank -> Safe', 'url' => ['/transaction/bank-to-safe']],
                    ['label' => 'Expenditure', 'url' => ['/teller/expenditure-payment']],
                ]
            ],
            [
                'label' => 'Reports',
                'items' => [
                    ['label' => 'Arrears', 'url' => ['/report/arrears']],
                    ['label' => 'To Pay', 'url' => ['/report/payment']],
                    ['label' => 'To Disburse', 'url' => ['/report/disburse']],
                    ['label' => 'Payments', 'url' => ['/report/payments', 'ReceiptSearch[from]' => date('Y-m-d')]],
                    ['label' => 'Receipts', 'url' => ['/report/receipts', 'ReceiptSearch[from]' => date('Y-m-d')]],
                    ['label' => 'Summary', 'url' => ['/report/summary']],
                    ['label' => 'Monthly Payments', 'url' => ['/report/monthly-payments']],
                    ['label' => 'Month Summary', 'url' => ['/report/monthly-details']],
                ]
            ],
            [
                'label' => 'Configure',
                'items' => [
                    ['label' => 'Day Start', 'url' => ['/maintenance/day-switch']],
                    ['label' => 'General Accounts', 'url' => ['/general-account/index']],
                    ['label' => 'Areas', 'url' => ['/area/index']],
                    ['label' => 'Banks', 'url' => ['/bank/index']],
                    ['label' => 'Bank Accounts', 'url' => ['/bank-account/index']],
                    ['label' => 'Vehicle Types', 'url' => ['/vehicle-type/index']],
                    ['label' => 'Vehicle Brands', 'url' => ['/vehicle-brand/index']],
                    ['label' => 'Templates', 'url' => ['/template/index']],
                ]
            ],
            [
                'label' => 'User',
                'items' => [
                    ['label' => 'Users', 'url' => ['/user-management/user/index']],
                    ['label' => 'Roles', 'url' => ['/user-management/role/index']],
                    ['label' => 'Permissions', 'url' => ['/user-management/permission/index']],
                    ['label' => 'Permission groups', 'url' => ['/user-management/auth-item-group/index']],
                    ['label' => 'Visit log', 'url' => ['/user-management/user-visit-log/index']],
                    ['label' => 'Change own password', 'url' => ['/user-management/auth/change-own-password']],
                ]
            ],
//            [
//                'label' => 'Frontend routes',
//                'items' => [
//                    ['label' => 'Login', 'url' => ['/user-management/auth/login']],
//                    ['label' => 'Logout', 'url' => ['/user-management/auth/logout']],
//                    ['label' => 'Registration', 'url' => ['/user-management/auth/registration']],
//                    ['label' => 'Change own password', 'url' => ['/user-management/auth/change-own-password']],
//                    ['label' => 'Password recovery', 'url' => ['/user-management/auth/password-recovery']],
//                    ['label' => 'E-mail confirmation', 'url' => ['/user-management/auth/confirm-email']],
//                ],
//            ],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= $day ?></p>
<!--        <p class="pull-right">--><?//= Yii::powered() ?><!--</p>-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
