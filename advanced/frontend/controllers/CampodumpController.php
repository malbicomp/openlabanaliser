<?php

namespace frontend\controllers;

use Yii;
use app\models\Campodump;
use app\models\Dump;
use app\models\CampodumpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;

/**
 * CampodumpController implements the CRUD actions for Campodump model.
 */
class CampodumpController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Campodump models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CampodumpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Campodump model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Campodump model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idDump)
    {
        $dump = Dump::findOne(['id' => $idDump]);

        for ($i=1; $i < $dump->qteCampos+1; $i++) { 
            $models[$i] = new Campodump();
            $models[$i]->idDump = $idDump;
            $models[$i]->campofisicodump = $i;
        }
                
        if (Model::loadMultiple($models, Yii::$app->request->post()) && Model::validateMultiple($models)) {
            foreach ($models as $model) {
                $model->save();
            }
            
            return $this->redirect(['dump/index']);

        } else {
            return $this->render('create', [
                'models' => $models,
                'qteCampos' => $dump->qteCampos,
            ]);
        }
    }

    /**
     * Updates an existing Campodump model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($idDump)
    {
        $dump = Dump::findOne(['id' => $idDump]);

        $models = $dump->campodumps;
        //Falta Consertar a organização dos campos
                
        if (Model::loadMultiple($models, Yii::$app->request->post()) && Model::validateMultiple($models)) {
            foreach ($models as $model) {
                $model->save();
            }
            
            return $this->redirect(['dump/index']);

        } else {

            return $this->render('update', [
                'models' => $models,
                'qteCampos' => $dump->qteCampos-1,
            ]);
        }
    }

    /**
     * Deletes an existing Campodump model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Campodump model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Campodump the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Campodump::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
