<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ArticleImage]].
 *
 * @see ArticleImage
 */
class ArticleImageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ArticleImage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ArticleImage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
