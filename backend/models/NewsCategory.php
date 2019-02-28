<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news_category".
 *
 * @property string $news_category_id
 * @property string $description
 *
 * @property News[] $news
 */
class NewsCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_category_id'], 'required'],
            [['news_category_id'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 255],
            [['news_category_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'news_category_id' => 'News Category ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['news_category_id' => 'news_category_id']);
    }
}
