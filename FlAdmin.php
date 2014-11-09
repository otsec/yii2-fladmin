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
     * @param string $header
     * @return string
     */
    public static function beginPanel($header = null)
    {
        $panel = Html::beginTag('div', ['class' => 'panel']);
        $body  = Html::beginTag('div', ['class' => 'panel-body']);

        if ($header) {
            $header = Html::tag('div', $header, ['class' => 'panel-heading']);
        }

        return $panel . "\n" . $header . "\n" . $body;
    }

    /**
     * @return string
     */
    public static function endPanel()
    {
        return str_repeat(Html::endTag('div'), 2);
    }
}