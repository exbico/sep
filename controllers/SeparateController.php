<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\auth\QueryParamAuth;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use app\models\SeparationApi;

/**
 * Class SeparateController
 * @package app\controllers
 */
class SeparateController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
            'tokenParam' => 'token'
        ];

        return $behaviors;
    } 

    /**
     * @inheritdoc
     */
    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
        ];
    }

    /**
     * @return int|null
     * @throws BadRequestHttpException
     */
    public function actionIndex()
    {
        $separation = new SeparationApi(['data' => Yii::$app->request->get()]);

        if (!$separation->checkData()) {
            throw new BadRequestHttpException('One of the parameters specified is missing or invalid');
        }

        return $separation->separate();

    }



}
