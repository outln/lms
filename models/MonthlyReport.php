<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "monthly_report".
 *
 * @property integer $year
 * @property integer $month
 * @property integer $mntstr
 * @property integer $loan_count
 * @property string $loan_value
 * @property double $exp_principal
 * @property double $exp_charges
 * @property double $exp_interest
 * @property double $exp_penalty
 * @property double $exp_total
 * @property double $exp_arr_principal
 * @property double $exp_arr_charges
 * @property double $exp_arr_interest
 * @property double $exp_arr_penalty
 * @property double $exp_arr_total
 * @property double $receivable
 * @property double $recv_principal
 * @property double $recv_charges
 * @property double $recv_interest
 * @property double $recv_penalty
 * @property double $recv_total
 * @property double $recv_arr_principal
 * @property double $recv_arr_charges
 * @property double $recv_arr_interest
 * @property double $recv_arr_penalty
 * @property double $recv_arr_total
 * @property double $received
 * @property double $savingBalance
 * @property double $partialPay
 * @property double $arrears
 * @property integer $settlment_count
 * @property double $settlment_amount
 */
class MonthlyReport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monthly_report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year', 'month', 'mntstr', 'loan_count', 'loan_value', 'exp_principal', 'exp_charges', 'exp_interest', 'exp_penalty', 'exp_total', 'exp_arr_principal', 'exp_arr_charges', 'exp_arr_interest', 'exp_arr_penalty', 'exp_arr_total', 'receivable', 'recv_principal', 'recv_charges', 'recv_interest', 'recv_penalty', 'recv_total', 'recv_arr_principal', 'recv_arr_charges', 'recv_arr_interest', 'recv_arr_penalty', 'recv_arr_total', 'received', 'savingBalance', 'partialPay', 'arrears', 'settlment_count', 'settlment_amount'], 'required'],
            [['year', 'month', 'mntstr', 'loan_count', 'settlment_count'], 'integer'],
            [['loan_value', 'exp_principal', 'exp_charges', 'exp_interest', 'exp_penalty', 'exp_total', 'exp_arr_principal', 'exp_arr_charges', 'exp_arr_interest', 'exp_arr_penalty', 'exp_arr_total', 'receivable', 'recv_principal', 'recv_charges', 'recv_interest', 'recv_penalty', 'recv_total', 'recv_arr_principal', 'recv_arr_charges', 'recv_arr_interest', 'recv_arr_penalty', 'recv_arr_total', 'received', 'savingBalance', 'partialPay', 'arrears', 'settlment_amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'year' => 'Year',
            'month' => 'Month',
            'mntstr' => 'Month String',
            'loan_count' => 'Loan Count',
            'loan_value' => 'Loan Value',
            'exp_principal' => 'Expected Principal',
            'exp_charges' => 'Expected Charges',
            'exp_interest' => 'Expected Interest',
            'exp_penalty' => 'Expected Penalty',
            'exp_total' => 'Expected Total',
            'exp_arr_principal' => 'Expected Arrears Principal',
            'exp_arr_charges' => 'Expected Arrears Charges',
            'exp_arr_interest' => 'Expected Arrears Interest',
            'exp_arr_penalty' => 'Expected Arrears Penalty',
            'exp_arr_total' => 'Expected Arrears Total',
            'receivable' => 'Receivable',
            'recv_principal' => 'Received Principal',
            'recv_charges' => 'Received Charges',
            'recv_interest' => 'Received Penalty',
            'recv_penalty' => 'Received Penalty',
            'recv_total' => 'Received Total',
            'recv_arr_principal' => 'Received Arrears Principal',
            'recv_arr_charges' => 'Received Arrears Interest',
            'recv_arr_interest' => 'Received Arrears Interest',
            'recv_arr_penalty' => 'Received Arrears Penalty',
            'recv_arr_total' => 'Received Arrears Total',
            'received' => 'Received',
            'savingBalance' => 'Saving Balance',
            'partialPay' => 'Partially Payed',
            'arrears' => 'Arrears',
            'settlment_count' => 'Settlement Count',
            'settlment_amount' => 'Settlement Amount',
        ];
    }

    /**
     * @inheritdoc
     * @return MonthlyReportQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MonthlyReportQuery(get_called_class());
    }
}