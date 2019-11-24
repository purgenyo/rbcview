<?php

namespace app\controllers;

use app\models\{
    ArticleImage, ArticlePageContent, ArticleQuery, Article
};
use Website\HtmlParser\Rbc\{
    ArticleItem, ArticleListInterface
};
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ArticleController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * return
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('article_list');
    }

    /**
     * article page
     *
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        if (!($model = Article::findOne(['id' => $id]))) {
            throw new NotFoundHttpException('page not found');
        }
        return $this->render('article_view', ['model' => $model]);
    }

}
