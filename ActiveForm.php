<?php

namespace otsec\yii2\fladmin;

use otsec\yii2\fladmin\ActiveField;
use otsec\yii2\fladmin\FlAdmin;
use yii\bootstrap\ActiveForm as BootstrapActiveForm;
use yii\helpers\Html;

/**
 * Class ActiveForm
 *
 * @method ActiveField field($model, $attribute, $config = [])
 *
 * @author Artem Belov <razor2909@gmail.com>
 */
class ActiveForm extends BootstrapActiveForm
{
    /**
     * @inheritdoc
     */
    public $fieldClass = 'otsec\yii2\fladmin\ActiveField';
    /**
     * @inheritdoc
     */
    public $fieldConfig = [
        'horizontalCssClasses' => [
            'label' => 'col-sm-3 col-md-2',
            'offset' => 'col-sm-offset-3 col-md-offset-2',
            'hint' => 'col-sm-offset-3 col-sm-9 col-md-offset-2 col-lg-6',
            'wrapper' => 'col-lg-6 col-sm-9 ',
        ],
    ];
    /**
     * @inheritdoc
     */
    public $layout = 'horizontal';
}