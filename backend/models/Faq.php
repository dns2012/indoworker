<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property int $faq_id
 * @property string $title
 * @property string $content
 * @property string $created_date
 * @property int $created_by Connect to user_admin
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['created_date'], 'safe'],
            //[['created_by'], 'integer'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => UserAdmin::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'faq_id' => 'Faq ID',
            'title' => 'Title',
            'content' => 'Content',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(UserAdmin::className(), ['id' => 'created_by']);
    }



}
