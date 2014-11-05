<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * @var yii\gii\generators\crud\Generator $generator
 * @var yii\web\View $this
 */

$modelClass = StringHelper::basename($generator->modelClass);
$modelVariableName = Inflector::variablize($modelClass);
$modelVariable = '$' . $modelVariableName;

echo "<?php\n";
?>

/**
 * @var <?= ltrim($generator->modelClass, '\\') ?> <?= $modelVariable ?> <?= "\n" ?>
 * @var yii\web\View $this
 */

$this->title = <?= $generator->generateString('Новый {modelClass}', ['modelClass' => Inflector::camel2words(StringHelper::basename($generator->modelClass))]) ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавление';
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-create">
    <?= "<?= " ?>$this->render('_form', [
        '<?= $modelVariableName ?>' => <?= $modelVariable ?>,
    ]) ?>
</div>
