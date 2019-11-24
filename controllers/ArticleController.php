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


    public function actionArticleProcess()
    {
        $list_items = Yii::$container->get(ArticleListInterface::class)->getArticleList();
        foreach ($list_items as $article_item) {
            $this->saveArticleItem($article_item);
        }
    }

    /**
     * @param ArticleItem $article
     */
    public function saveArticleItem(ArticleItem $article)
    {
        $article_model = new Article;
        $article_model->title = $article->title;
        $article_model->small_content = mb_substr($article->content, 0, 200);
        $article_model->overview = $article->overview;
        $article_model->content = $article->content;
        $article_model->save();

        if ($article->main_image) {
            $article_image = new ArticleImage();
            $article_image->src = $article->main_image;
            $article_image->link('article', $article_model);
        }

        if ($article->original_page) {
            $article_content = new ArticlePageContent();
            $article_content->content = $article->original_page;
            $article_content->original_link = $article->page_url;
            $article_content->link('article', $article_model);
        }
    }

}
