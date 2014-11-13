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

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use otsec\yii2\bootstrap\ActiveForm;
use otsec\yii2\fladmin\FlAdmin;
use yii\helpers\Html;

/**
 * @var <?= $modelVariable ?> <?= ltrim($generator->modelClass, '\\') ?> <?= "\n" ?>
 * @var $this yii\web\View
 */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">
    <?= "<?php " ?>$form = ActiveForm::begin() ?>

    <?= "<?= " ?>FlAdmin::beginPanel('Основные параметры') ?>
<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        $field = $generator->generateActiveField($attribute);
        $field = str_replace('$model', $modelVariable, $field);
        echo "                <?= " . $field . " ?>\n";
    }
} ?>
    <?= "<?= " ?>FlAdmin::endPanel() ?>

    <?= "<?= " ?>FlAdmin::beginPanel() ?>
        <?= "<?= " ?>$form->beginWrapper() ?>
            <?= "<?= " ?>Html::submitButton(<?= $modelVariable ?>->isNewRecord ? <?= $generator->generateString('Создать') ?> : <?= $generator->generateString('Сохранить') ?>, ['class' => <?= $modelVariable ?>->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= "<?= " ?>Html::a(<?= $generator->generateString('Вернуться назад') ?>, ['index'], ['class' => 'btn btn-default']) ?>
        <?= "<?= " ?>$form->endWrapper() ?>
    <?= "<?= " ?>FlAdmin::endPanel() ?>

    <?= "<?php " ?>ActiveForm::end(); ?>
</div>
