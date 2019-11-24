<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_page_content".
 *
 * @property int $id
 * @property int|null $article
 * @property string|null $content
 *
 * @property Article $article0
 */
class ArticlePageContent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_page_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article'], 'integer'],
            [['content'], 'string'],
            [['article'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article' => 'Article',
            'content' => 'Content',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::class, ['id' => 'article']);
    }

    /**
     * {@inheritdoc}
     * @return ArticlePageContentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticlePageContentQuery(get_called_class());
    }
}
