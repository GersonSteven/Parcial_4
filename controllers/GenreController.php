<?php

namespace app\controllers;

use app\models\Genre;
use app\models\GenreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GenreController implements the CRUD actions for Genre model.
 */
class GenreController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Genre models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GenreSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Genre model.
     * @param int $ID_GENRE Id Genre
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID_GENRE)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID_GENRE),
        ]);
    }

    /**
     * Creates a new Genre model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Genre();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID_GENRE' => $model->ID_GENRE]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Genre model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID_GENRE Id Genre
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID_GENRE)
    {
        $model = $this->findModel($ID_GENRE);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_GENRE' => $model->ID_GENRE]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Genre model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID_GENRE Id Genre
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID_GENRE)
    {
        $this->findModel($ID_GENRE)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Genre model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID_GENRE Id Genre
     * @return Genre the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID_GENRE)
    {
        if (($model = Genre::findOne(['ID_GENRE' => $ID_GENRE])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}