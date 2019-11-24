<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Article]].
 *
 * @see Article
 */
class ArticleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    public function byId($id)
    {
        return $this->andWhere('[[id]]='.$id);
    }

    /**
     * {@inheritdoc}
     * @return Article[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Article|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
