<?php

/**
 * @var yii\gii\generators\crud\Generator $generator
 * @var yii\web\View $this
 */

echo "<?php\n";
?>

use otsec\flatlab\helpers\FA;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 */
?>

<div class="panel">
    <div class="panel-body">
        <div class="pull-left">
            {summary}
        </div>
        <div class="pull-right">
            <?= "<?= " ?>Html::a(FA::iconText('plus', 'добавить новый'), ['create'], ['class' => 'btn btn-success btn-sm']) ?>
        </div>
    </div>

    <div class="panel-body">
        {items}
        {pager}
    </div>
</div>