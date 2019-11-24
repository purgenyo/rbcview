<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ArticlePageContent]].
 *
 * @see ArticlePageContent
 */
class ArticlePageContentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ArticlePageContent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ArticlePageContent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
