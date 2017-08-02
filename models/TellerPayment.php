<?php

namespace app\models;
use app\utils\validators\SavingAccountValidator;

/**
 * This is the model class for table "account".
 *
 * @property integer $txid
 * @property string $loanId
 * @property double $amount
 * @property string $payment
 * @property string $description
 * @property integer $bankAccount
 * @property integer $cheque
 * @property integer $stage
 * @property string $link
 * @property string $user
 */
class TellerPayment extends \yii\base\Model
{
    public $txid;
    public $loanId;
    public $amount;
    public $payment;
    public $bankAccount;
    public $cheque;
    public $description;
    public $stage;
    public $link;
    public $user;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loanId', 'amount', 'description', 'stage', 'link'], 'required'],
            [['loanId', 'description', 'link', 'payment'], 'string'],
            [['amount', 'stage','txid','bankAccount'], 'number', 'min' => 0],
            [['loanId'], 'string', 'max' => 10],
            [['cheque'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'txid' => 'Transaction ID',
            'loanId' => 'Loan ID',
            'amount' => 'Amount',
            'payment' => 'Payment',
            'bankAccount' => 'Bank Account',
            'cheque' => 'Cheque Number',
            'description' => 'Description',
            'stage' => 'Stage',
            'link' => 'Link',
            'user' => 'User',
        ];
    }
}
