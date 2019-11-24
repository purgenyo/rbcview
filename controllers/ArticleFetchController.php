<?php

namespace app\controllers;

use app\models\{
    ArticleImage, ArticlePageContent, Article
};
use Website\HtmlParser\Rbc\{
    ArticleItem, ArticleListInterface
};
use Yii;
use yii\web\Controller;

class ArticleFetchController extends Controller
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

    public function actionArticleProcess()
    {
        $list_items = Yii::$container->get(ArticleListInterface::class)->getArticleList();
        $result = array_fill_keys(['success', 'failed'], 0);
        foreach ($list_items as $article_item) {
            $res = $this->saveArticleItem($article_item) == true;
            $result[$res == true ? 'success' : 'failed']++;
        }
        return $this->render('fetch_result', compact('result'));
    }

    public function saveArticleItem(ArticleItem $article): bool
    {
        $article_model = new Article;
        $article_model->title = $article->title;
        $article_model->small_content = mb_substr($article->content, 0, 200);
        $article_model->overview = $article->overview;
        $article_model->content = $article->content;
        if (!$article_model->save()) {
            return false;
        }

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

        return true;

    }

}
