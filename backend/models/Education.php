<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "education".
 *
 * @property string $edu_id
 * @property string $description
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['edu_id'], 'required'],
            [['edu_id'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 50],
            [['edu_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'edu_id' => 'Edu ID',
            'description' => 'Description',
        ];
    }
}
