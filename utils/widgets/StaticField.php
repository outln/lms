<?php
/**
 * Created by PhpStorm.
 * User: Supun
 * Date: 7/12/2017
 * Time: 9:14 PM
 */

namespace app\utils\widgets;


use yii\bootstrap\Html;
use yii\widgets\InputWidget;

class StaticField extends InputWidget
{
    /* @var string */
    public $text;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        $attr = $this->attribute;
        if ($this->text == null) {
            return '<span style="color: red; margin-right: 20px;"><i>Not Set</i></span>'
                . Html::a("Set", $this->url, ['class' => 'ui button blue', 'id' => 'csbtn_' . $this->attribute]);
        }
        return '<span style="color: #1e70bf"><b>'.$this->text .'</b></span>'. Html::activeHiddenInput($this->model, $this->attribute, ['value' => $this->model->$attr]);
    }


}