<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m191122_164053_base_tabels
 */
class m191122_164053_base_tabels extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'small_content' => Schema::TYPE_STRING,
            'overview' => Schema::TYPE_STRING,
            'content' => Schema::TYPE_TEXT,
            'created_at' => Schema::TYPE_TIMESTAMP,
            'updated_at' => Schema::TYPE_TIMESTAMP,
        ]);

        $this->createTable('article_image', [
            'id' => Schema::TYPE_PK,
            'article' => Schema::TYPE_INTEGER,
            'src' => Schema::TYPE_STRING . ' NOT NULL',
        ]);

        $this->createTable('article_page_content', [
            'id' => Schema::TYPE_PK,
            'article' => Schema::TYPE_INTEGER,
            'original_link' => Schema::TYPE_TEXT,
            'content' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
        ]);

        $this->addForeignKey(
            'article_page_content_fk',
            'article_image',
            'article',
            'article',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'article_image_fk',
            'article_page_content',
            'article',
            'article',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article_page_content');
        $this->dropTable('article_image');
        $this->dropTable('article');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191122_164053_base_tabels cannot be reverted.\n";

        return false;
    }
    */
}
