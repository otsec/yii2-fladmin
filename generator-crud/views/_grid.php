<?php

/**
 * @var $generator yii\gii\generators\crud\Generator
 * @var $this      yii\web\View
 */

echo "<?php\n";
?>

use yii\helpers\Html;

/**
 * @var $this yii\web\View
 */
?>

<div class="panel">
    <div class="panel-body">
        <div class="pull-left">
            {summary}
        </div>
        <div class="pull-right">
            <?= "<?= " ?>Html::a('<i class="fa fa-plus"></i> добавить новый', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
        </div>
    </div>

    <div class="panel-body">
        {items}
        {pager}
    </div>
</div>