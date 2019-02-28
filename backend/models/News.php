<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $news_id
 * @property string $news_category_id
 * @property string $news_source
 * @property resource $photo
 * @property string $title
 * @property string $content
 * @property string $tag
 * @property string $created_date
 * @property int $created_by
 *
 * @property NewsCategory $newsCategory
 * @property UserAdmin $createdBy
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_category_id', 'title', 'content', 'tag', 'created_by'], 'required'],
            [['photo', 'content'], 'string'],
            [['created_date'], 'safe'],
            [['created_by'], 'integer'],
            [['news_category_id'], 'string', 'max' => 20],
            [['news_source'], 'string', 'max' => 100],
            [['title', 'tag'], 'string', 'max' => 255],
            [['news_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsCategory::className(), 'targetAttribute' => ['news_category_id' => 'news_category_id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => UserAdmin::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'news_category_id' => 'News Category',
            'news_source' => 'News Source',
            'photo' => 'Photo',
            'title' => 'Title',
            'content' => 'Content',
            'tag' => 'Tag',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsCategory()
    {
        return $this->hasOne(NewsCategory::className(), ['news_category_id' => 'news_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(UserAdmin::className(), ['id' => 'created_by']);
    }
}
