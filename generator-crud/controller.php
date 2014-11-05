<?php
/**
 * This is the template for generating a CRUD controller class file.
 */

use yii\db\ActiveRecordInterface;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * @var yii\gii\generators\crud\Generator $generator
 * @var yii\web\View $this
 */

$controllerNamespace = StringHelper::dirname(ltrim($generator->controllerClass, '\\'));
$controllerClass = StringHelper::basename($generator->controllerClass);
$baseControllerNamespace = StringHelper::dirname(ltrim($generator->baseControllerClass, '\\'));
$modelClass = StringHelper::basename($generator->modelClass);
$searchModelClass = StringHelper::basename($generator->searchModelClass);
if ($modelClass === $searchModelClass) {
    $searchModelAlias = $searchModelClass . 'Search';
}

$modelVariableName = Inflector::variablize($modelClass);
$modelVariable = '$' . $modelVariableName;
$searchModelVariable = $modelVariable . 'Search';

/* @var $class ActiveRecordInterface */
$class = $generator->modelClass;
$pks = $class::primaryKey();
$urlParams = $generator->generateUrlParams();
$urlParams = str_replace('$model', $modelVariable, $urlParams);
$actionParams = $generator->generateActionParams();
$actionParamComments = $generator->generateActionParamComments();


echo "<?php\n";
?>

namespace <?= $controllerNamespace ?>;

use <?= ltrim($generator->modelClass, '\\') ?>;
<?php if (!empty($generator->searchModelClass)): ?>
use <?= ltrim($generator->searchModelClass, '\\') . (isset($searchModelAlias) ? " as $searchModelAlias" : "") ?>;
<?php else: ?>
use yii\data\ActiveDataProvider;
<?php endif; ?>
<?php if ($baseControllerNamespace !== $controllerNamespace): ?>
use <?= ltrim($generator->baseControllerClass, '\\') ?>;
<?php endif ?>
use yii\web\NotFoundHttpException;
use Yii;

/**
 * Class <?= $controllerClass ?> 
 * @package <?= $controllerNamespace ?> 
 */
class <?= $controllerClass ?> extends <?= StringHelper::basename($generator->baseControllerClass) . "\n" ?>
{
    /**
     * Lists all <?= $modelClass ?> models.
     * @return mixed
     */
    public function actionIndex()
    {
<?php if (!empty($generator->searchModelClass)): ?>
        <?= $searchModelVariable ?> = new <?= isset($searchModelAlias) ? $searchModelAlias : $searchModelClass ?>();
        $dataProvider = <?= $searchModelVariable ?>->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            '<?= ltrim($searchModelVariable, '$') ?>' => <?= $searchModelVariable ?>,
            'dataProvider' => $dataProvider,
        ]);
<?php else: ?>
        $dataProvider = new ActiveDataProvider([
            'query' => <?= $modelClass ?>::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
<?php endif; ?>
    }

    /**
     * Creates a new <?= $modelClass ?> model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        <?= $modelVariable ?> = new <?= $modelClass ?>();

        if (<?= $modelVariable ?>->load(Yii::$app->request->post()) && <?= $modelVariable ?>->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            '<?= $modelVariableName ?>' => <?= $modelVariable ?>,
        ]);
    }

    /**
     * Updates an existing <?= $modelClass ?> model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * <?= implode("\n     * ", $actionParamComments) . "\n" ?>
     * @return mixed
     */
    public function actionUpdate(<?= $actionParams ?>)
    {
        <?= $modelVariable ?> = $this->find<?= $modelClass ?>(<?= $actionParams ?>);

        if (<?= $modelVariable ?>->load(Yii::$app->request->post()) && <?= $modelVariable ?>->save()) {
            Yii::$app->session->setFlash('<?= Inflector::camel2id($modelVariableName) ?>-update-success', true);
            return $this->redirect(['update', <?= $urlParams ?>]);
        }

        return $this->render('update', [
            '<?= $modelVariableName ?>' => <?= $modelVariable ?>,
        ]);
    }

    /**
     * Deletes an existing <?= $modelClass ?> model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * <?= implode("\n     * ", $actionParamComments) . "\n" ?>
     * @return mixed
     */
    public function actionDelete(<?= $actionParams ?>)
    {
        $this->find<?= $modelClass ?>(<?= $actionParams ?>)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the <?= $modelClass ?> model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * <?= implode("\n     * ", $actionParamComments) . "\n" ?>
     * @return <?= $modelClass ?> the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function find<?= $modelClass ?>(<?= $actionParams ?>)
    {
<?php
if (count($pks) === 1) {
    $condition = '$id';
} else {
    $condition = [];
    foreach ($pks as $pk) {
        $condition[] = "'$pk' => \$$pk";
    }
    $condition = '[' . implode(', ', $condition) . ']';
}
?>
        if ((<?= $modelVariable ?> = <?= $modelClass ?>::findOne(<?= $condition ?>)) !== null) {
            return <?= $modelVariable ?>;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
