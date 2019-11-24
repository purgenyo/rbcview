<?php

namespace app\models;

use Website\HtmlParser\Rbc\ArticleItem;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string|null $small_content
 * @property string|null $content
 * @property string|null $overview
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property ArticleImage[] $articleImages
 * @property ArticlePageContent[] $articlePageContents
 */
class Article extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => function(){ return date('Y-m-d H:i:s');},
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'small_content', 'overview'], 'string', 'max' => 255],
        ];
    }


    public function getSearchProvider()
    {
        $query = new ArticleQuery(self::class);
        $query->all();

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 15,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'title' => SORT_ASC,
                ]
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'small_content' => 'Small Content',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleImages()
    {
        return $this->hasMany(ArticleImage::class, ['article' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticlePageContents()
    {
        return $this->hasMany(ArticlePageContent::class, ['article' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleQuery(get_called_class());
    }

}
