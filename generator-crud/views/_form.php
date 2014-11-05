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

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Html;

/**
 * @var <?= ltrim($generator->modelClass, '\\') ?> <?= $modelVariable ?> <?= "\n" ?>
 * @var yii\web\View $this
 */
?>

<?= '<?php ' ?>if (Yii::$app->session->getFlash('<?= Inflector::camel2id($modelVariableName) ?>-update-success')): ?>
    <?= '<?= ' ?>Alert::widget([
        'options' => ['class' => 'alert-success'],
        'body' => 'Изменения успешно сохранены',
    ])?>
<?= '<?php ' ?>endif ?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">
    <?= "<?php " ?>$form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-10',
                'hint' => 'col-sm-10 col-sm-offset-2',
            ],
        ],
    ]); ?>

    <div class="panel">
        <div class="panel-heading">Основные параметры</div>
        <div class="panel-body no-bottom">
<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        $field = $generator->generateActiveField($attribute);
        $field = str_replace('$model', $modelVariable, $field);
        echo "            <?= " . $field . " ?>\n";
    }
} ?>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <?= "<?= " ?>Html::submitButton(<?= $modelVariable ?>->isNewRecord ? <?= $generator->generateString('Создать') ?> : <?= $generator->generateString('Сохранить') ?>, ['class' => <?= $modelVariable ?>->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <?= "<?= " ?>Html::a(<?= $generator->generateString('Вернуться назад') ?>, ['index'], ['class' => 'btn btn-default']) ?>
                </div>
            </div>
        </div>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>
</div>
