<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * @var $generator yii\gii\generators\crud\Generator
 * @var $this      yii\web\View
 */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

<?php if ($generator->indexWidgetType === 'list'): ?> use yii\helpers\Html;<?php endif; ?>
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;

/**
<?= !empty($generator->searchModelClass) ? " * @var $". Inflector::variablize(StringHelper::basename($generator->searchModelClass)) . ' ' . ltrim($generator->searchModelClass, '\\') ."\n" : '' ?>
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $this         yii\web\View
 */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
<?php if ($generator->indexWidgetType === 'grid'): ?>
    <?= "<?= " ?>GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => $this->render('_grid'),
        'columns' => [
<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) { ?>
            [
                'attribute' => '<?= $name ?>',
                'contentOptions' => ['class' => ''],
                'headerOptions' => ['width' => ''],
            ],
<?php   } else { ?>
            /*[
                'attribute' => '<?= $name ?>',
                'contentOptions' => ['class' => ''],
                'headerOptions' => ['width' => ''],
            ],*/
<?php   }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if (++$count < 6) { ?>
            [
                'attribute' => '<?= $column->name ?>',
                'format' => '<?= ($format === 'text') ? 'text' : $format ?>',
                'contentOptions' => ['class' => ''],
                'headerOptions' => ['width' => ''],
            ],
<?php   } else { ?>
            /*[
                'attribute' => '<?= $column->name ?>',
                'format' => '<?= ($format === 'text') ? 'text' : $format ?>',
                'contentOptions' => ['class' => ''],
                'headerOptions' => ['width' => ''],
            ],*/
<?php   }
    }
}
?>
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['width' => 70],
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>
</div>
