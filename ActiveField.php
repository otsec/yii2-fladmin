<?php

namespace otsec\yii2\fladmin;

use yii\bootstrap\ActiveField as BootstrapActiveField;
use yii\helpers\Html;

/**
 * Class ActiveForm
 *
 * @property array $defaultSize
 * @property array $smallSize
 * @property array $mediumSize
 *
 * @author Artem Belov <razor2909@gmail.com>
 */
class ActiveField extends BootstrapActiveField
{
    /**
     * @param string  $before
     * @param string  $after
     * @param boolean $encode
     * @return static
     */
    public function group($before = null, $after = null, $encode = true)
    {
        $input = '{input}';

        if ($before) {
            $before = ($encode) ? Html::encode($before) : $before;
            $input = Html::tag('span', $before, ['class' => 'input-group-addon']) . $input;
        }
        if ($after) {
            $after = ($encode) ? Html::encode($after) : $after;
            $input = $input . Html::tag('span', $after, ['class' => 'input-group-addon']);
        }

        $this->inputTemplate = Html::tag('div', $input, ['class' => 'input-group']);

        return $this;
    }

    /**
     * @return static
     */
    public function xs()
    {
        $this->wrapperOptions['class'] = 'col-sm-4 col-md-2';
        $this->hintOptions['class'] = 'col-sm-offset-3 col-sm-4 col-md-offset-2 col-md-2';

        return $this;
    }

    /**
     * @return static
     */
    public function sm()
    {
        $this->wrapperOptions['class'] = 'col-sm-6 col-md-4';
        $this->hintOptions['class'] = 'col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-4';

        return $this;
    }

    /**
     * @return static
     */
    public function lg()
    {
        $this->wrapperOptions['class'] = 'col-sm-9 col-md-10';
        $this->hintOptions['class'] = 'col-sm-offset-3 col-sm-9 col-md-offset-2 col-md-10';

        return $this;
    }

    /**
     * @return static
     */
    public function labelHideable()
    {
        Html::addCssClass($this->labelOptions, 'hidden-xs');
        return $this;
    }
}