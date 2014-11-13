<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * @var $generator yii\gii\generators\crud\Generator
 * @var $this      yii\web\View
 */

$modelClass = StringHelper::basename($generator->modelClass);
$modelVariableName = Inflector::variablize($modelClass);
$modelVariable = '$' . $modelVariableName;

echo "<?php\n";
?>

/**
 * @var <?= $modelVariable ?> <?= ltrim($generator->modelClass, '\\') ?> <?= "\n" ?>
 * @var $this yii\web\View
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
