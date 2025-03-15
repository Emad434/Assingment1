<?php
namespace app\controllers;

use Yii;
use yii\rest\Controller;
use yii\web\Response;
use app\models\Application;
use yii\web\NotFoundHttpException;

class ApplicationController extends Controller
{
    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => \yii\filters\ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    public function actionCreate()
    {
        $model = new Application();
        $model->load(Yii::$app->request->post(), '');

        if ($model->save()) {
            return ['success' => true, 'data' => $model];
        }

        return ['success' => false, 'errors' => $model->errors];
    }

    public function actionUpdate($id)
    {
        $model = Application::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException("Application not found.");
        }

        $model->load(Yii::$app->request->post(), '');
        if ($model->save()) {
            return ['success' => true, 'data' => $model];
        }

        return ['success' => false, 'errors' => $model->errors];
    }
}

