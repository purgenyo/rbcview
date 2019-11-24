<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_image".
 *
 * @property int $id
 * @property int|null $article
 * @property string $src
 *
 * @property Article $article0
 */
class ArticleImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article'], 'integer'],
            [['src'], 'required'],
            [['src'], 'string', 'max' => 255],
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
            'src' => 'Src',
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
     * @return ArticleImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleImageQuery(get_called_class());
    }
}
