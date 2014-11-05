<?php

namespace otsec\yii2\fladmin;

use yii\helpers\Html;

/**
 * Class FlAdmin
 * @author Artem Belov <razor2909@gmail.com>
 */
class FlAdmin
{
    /**
     * @param string  $header
     * @param boolean $wrapContent
     * @return string
     */
    public static function beginPanel($header = null, $wrapContent = false)
    {
        $output = Html::beginTag('div', ['class' => 'panel']);

        if ($header) {
            $output .= Html::tag('div', $header, ['class' => 'panel-heading']);
        }

        $output .= Html::beginTag('div', ['class' => 'panel-body']);

        if ($wrapContent) {
            $output .= static::beginWrapper();
        }

        return $output;
    }

    /**
     * @return string
     */
    public static function beginWrapper()
    {
        return
            Html::beginTag('div', ['class' => 'form-group']) .
            Html::beginTag('div', ['class' => 'col-sm-offset-3 col-sm-9 col-md-offset-2 col-md-10']);
    }

    /**
     * @param boolean $wrapContent
     * @return string
     */
    public static function endPanel($wrapContent = false)
    {
        $output = str_repeat(Html::endTag('div'), 2);

        if ($wrapContent) {
            $output .= static::endWrapper();
        }

        return $output;
    }

    /**
     * @return string
     */
    public static function endWrapper()
    {
        return str_repeat(Html::endTag('div'), 2);
    }
}