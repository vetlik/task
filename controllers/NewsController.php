<?php

namespace app\controllers;

use Yii;
use app\models\News;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => News::find()->orderBy('id DESC'),
            'pagination' => [
                'pageSize' => 3,
            ],
        ]);
        return $this->render('index',compact('dataProvider'));
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model,'image');
            if ($model->image){
                $path = Yii::getAlias('@webroot/upload/files').
                    $model->image->baseName.
                    '.'.
                    $model->image->extension;
                $model->image->saveAs($path);
                $model->attachImage($path);

            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeleteimg($id)
    {
        $tmp = explode('-',$id);
        $rid = $tmp[0];
        $iid = $tmp[1];
        $model = News::getOneNews($rid);
        $images = $model->getImages();
        foreach($images as $img){
            if ($img->id == $iid){$model->removeImage($img);}
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }

    /**
     * Deletes an existing News model.
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
     * @param $id
     * @return \yii\web\Response
     */
    public function actionPublish($id)
    {
        if(!$id) {
            throw new BadRequestHttpException('Запись не найдена');
        }
        $model = $this->findModel($id);
        if($model->published == 0) {
            $model->updateAttributes(['published'=>1]);
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionDeactivate($id)
    {
        if(!$id) {
            throw new BadRequestHttpException('Запись не найдена');
        }
        $model = $this->findModel($id);
        if($model->published == 1) {
            $model->updateAttributes(['published'=>0]);
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
